<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;

class BelongsToDomain implements Rule
{

    protected $domain;

    public function __construct($domain)
    {
        $this->domain = $domain;
    }


    public function passes($attribute, $value)
    {
        $http = "http://{$this->domain}";

        $httpLen = strlen($http);

        if (substr($value, 0, $httpLen) === $http) {
            return true;
        }

        $https = "https://{$this->domain}";
        if (substr($value, 0, $httpLen + 1) === $https) {
            return true;
        }

        return false;
    }

    public function message()
    {
        return ":attribute 不属于域名{$this->domain}。";
    }
}
