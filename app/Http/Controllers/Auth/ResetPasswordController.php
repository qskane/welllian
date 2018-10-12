<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{

    public function showMobileResetForm()
    {
        $mobile = auth()->check() ? auth()->user()->mobile : '';

        return view('auth.passwords.mobile_reset')->with(compact('mobile'));
    }

    public function mobileReset(ResetPasswordRequest $request)
    {
        /*
         * authenticated with verification code
         */
        $user = User::where('mobile', $request->mobile())->firstOrFail();

        $user->password = Hash::make($request->get('password'));

        $user->setRememberToken(Str::random(60));

        if ($status = $user->save()) {
            event(new PasswordReset($user));
            Auth::guard()->login($user);
        }

        return redirect()->route('user.index')->with('status', $status);
    }

}
