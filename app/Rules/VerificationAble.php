<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class VerificationAble implements Rule
{

    const ABLES = ['EMAIL', 'MOBILE'];

    public function passes($attribute, $value)
    {
        if ($this->isMobile($attribute, $value)) {
            return true;
        }

        return $this->isEmail($attribute, $value);
    }

    public function isEmail($attribute, $value)
    {
        $emailValidator = Validator::make([$attribute => $value], [$attribute => 'email']);

        return !$emailValidator->fails();
    }

    public function isMobile($attribute, $value)
    {
        $telValidator = Validator::make([$attribute => $value], [$attribute => 'string|size:11']);

        return !$telValidator->fails();
    }

    public function message()
    {
        return ':attribute 无效。';
    }
}
