<?php

namespace App\Http\Requests;

use App\Models\VerificationCode;
use App\Rules\VerificationAble;
use Illuminate\Foundation\Http\FormRequest;

class VerificationCodeRequest extends FormRequest
{

    public function authorize()
    {
        $verificationCode = new VerificationCode;
        if ($verificationCode->verificationOverloaded($this->get('verification'))
            || $verificationCode->ipOverloaded($this->ip())
        ) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'verification' => [new VerificationAble],
        ];
    }

}
