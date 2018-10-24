<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function rules()
    {
        return [
            'contact' => 'required|string',
            'content' => 'required|string',
        ];
    }

    public function inputs()
    {
        return [
            'contact' => $this->get('contact'),
            'content' => $this->get('content'),
        ];
    }

}
