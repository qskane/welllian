<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {

        $verificationCode = $data['mobile_verification_code'] ?? 0;
        $mobile = $data['mobile'] ?? 0;

        return Validator::make($data, [
            'mobile' => 'required|string|size:11|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobile_verification_code' => [
                'required',
                'string',
                'size:6',
                Rule::exists('verification_codes', 'code')->where(function ($query) use ($mobile, $verificationCode) {
                    $query->where([
                        'verification' => $mobile,
                        'code' => $verificationCode,
                    ])->where('created_at', '>', Carbon::make('-30 minutes'));
                }),
            ],

        ]);
    }

    protected function create(array $data)
    {
        $mobile = $data['mobile'];
        $name = substr($mobile, 0, 3) . '*****' . substr($mobile, -3);

        return User::create([
            'name' => $name,
            'mobile' => $mobile,
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        $this->alertSuccess();

        return redirect($this->redirectTo);
    }


}
