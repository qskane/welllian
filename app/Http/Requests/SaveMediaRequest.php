<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SaveMediaRequest extends FormRequest
{
    public function authorize()
    {
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
            'name' => 'required|string',
            'domain' => ['required', 'string', 'regex:/^(([a-zA-Z]{1})|([a-zA-Z]{1}[a-zA-Z]{1})|([a-zA-Z]{1}[0-9]{1})|([0-9]{1}[a-zA-Z]{1})|([a-zA-Z0-9][a-zA-Z0-9-_]{1,61}[a-zA-Z0-9]))\.([a-zA-Z]{2,6}|[a-zA-Z0-9-]{2,30}\.[a-zA-Z]{2,3})$/', 'unique:medias'],
            'promotion_url' => 'required|string|url',
            'logo' => 'nullable',
            'description' => 'nullable',
        ];
    }


    public function getInputs()
    {
        return [
            'name' => $this->get('name'),
            'domain' => $this->get('domain'),
            'promotion_url' => $this->get('promotion_url'),
            'logo' => $this->get('logo') ?? '',
            'description' => $this->get('description') ?? '',
        ];
    }

}
