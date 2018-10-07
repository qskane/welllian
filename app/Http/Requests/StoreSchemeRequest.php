<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSchemeRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        $quantityMax = config('league.scheme.max_quantity');

        return [
            'name' => 'required|string',
            'container' => ['required', 'string', 'regex:/^[a-zA-Z]{1}[a-zA-Z0-9_-]*$/'],
            'quantity' => ['required', 'integer', "between:1,$quantityMax"],
            'media_id' => 'required|integer|exists:medias,id',
            'template_id' => 'required|integer|exists:templates,id',
            'running' => 'required|boolean',
        ];
    }


    public function inputs()
    {
        return [
            'name' => $this->get('name'),
            'container' => $this->get('container'),
            'quantity' => (int)$this->get('quantity'),
            'media_id' => (int)$this->get('media_id'),
            'template_id' => (int)$this->get('template_id'),
            'running' => (boolean)$this->get('running'),
        ];
    }

}
