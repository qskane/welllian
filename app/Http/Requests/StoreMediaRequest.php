<?php

namespace App\Http\Requests;

use App\Rules\BelongsToDomain;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
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
            'domain' => [
                'required',
                'string',
                'regex:/^(([a-zA-Z]{1})|([a-zA-Z]{1}[a-zA-Z]{1})|([a-zA-Z]{1}[0-9]{1})|([0-9]{1}[a-zA-Z]{1})|([a-zA-Z0-9][a-zA-Z0-9-_]{1,61}[a-zA-Z0-9]))\.([a-zA-Z]{2,6}|[a-zA-Z0-9-]{2,30}\.[a-zA-Z]{2,3})$/',
                Rule::unique('medias')->ignore($this->id()),
            ],
            'consume_url' => [
                'required',
                'string',
                'url',
                new BelongsToDomain($this->get('domain')),
            ],
            'logo' => 'nullable',
            'description' => 'nullable',
        ];
    }

    public function id()
    {
        return request()->route('medium', 0);
    }

    public function inputs()
    {
        return [
            'name' => $this->get('name'),
            'domain' => $this->get('domain'),
            'consume_url' => $this->normalizeConsumeUrl(),
            'logo' => $this->get('logo') ?? '',
            'description' => $this->get('description') ?? '',
        ];
    }

    protected function normalizeConsumeUrl()
    {
        $url = $this->get('consume_url');
        $end = substr($url, -1);
        if ($end === '?' || $end === '&') {
            return substr($url, 0, -1);
        }

        return $url;
    }

}
