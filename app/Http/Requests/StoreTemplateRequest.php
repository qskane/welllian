<?php

namespace App\Http\Requests;


class StoreTemplateRequest extends StoreMediaRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'html' => 'required|string',
        ];
    }

    public function inputs()
    {
        return [
            'name' => $this->get('name'),
            'html' => $this->get('html'),
        ];
    }

}
