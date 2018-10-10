<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/user';

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
                    ])->where('created_at', '>', Carbon::make('-' . config('web.verification_code_expires')));
                }),
            ],

        ]);
    }

    protected function create(array $data)
    {
        return (new User(array_only($data, ['mobile', 'password'])))->simpleCreate();
    }

    protected function registered(Request $request, $user)
    {
        Wallet::create(['user_id' => $user->id]);

        // FIXME 转账初始coin

        $this->alertSuccess();

        return redirect($this->redirectTo);
    }


}
