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

    protected $redirectTo = '/';

    public function showMobileResetForm()
    {
        $mobile = auth()->check() ? auth()->user()->mobile : '';

        return view('auth.passwords.mobile_reset')->with(compact('mobile'));
    }

    public function mobileReset(ResetPasswordRequest $request)
    {
        $user = User::where('mobile', $request->get('mobile'))->firstOrFail();

        $this->resetPassword($user, $request->get('password'));

        return redirect($this->redirectTo)->with('status', true);
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        Auth::guard()->login($user);
    }

}
