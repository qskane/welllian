<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $verification = $this->mobile();
        $code = $this->get('mobile_verification_code');

        return [
            'mobile' => ['required', 'string', 'size:11', 'exists:users,mobile'],
            'password' => 'required|string|min:6|confirmed',
            'mobile_verification_code' => [
                'required',
                'string',
                'size:6',
                Rule::exists('verification_codes', 'code')->where(function ($query) use ($verification, $code) {
                    $seconds = config('web.verification_code.expires_seconds');
                    $query->where(compact('verification', 'code'))
                        ->where('created_at', '>', Carbon::make("-$seconds seconds"));
                }),
            ],
        ];
    }

    public function mobile()
    {
        return $this->get('mobile');
    }

}
