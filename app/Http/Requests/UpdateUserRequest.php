<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('users')->ignore(Auth::id()),
            ],
        ];
    }


}
