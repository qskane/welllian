<?php

namespace App\Http\Requests;

use App\Models\VerificationCode;
use App\Rules\VerificationAble;
use Illuminate\Foundation\Http\FormRequest;

class VerificationCodeRequest extends FormRequest
{

    public function authorize()
    {
        if (VerificationCode::overloaded($this->get('verification'))) {
            return false;
        }

        // FIXME check IP is overloaded

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
            'verification' => ['required', new VerificationAble],
        ];
    }

}
