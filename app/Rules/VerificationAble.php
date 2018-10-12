<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class VerificationAble implements Rule
{

    const ABLES = ['EMAIL', 'MOBILE',];

    protected $message;


    public function passes($attribute, $value)
    {

        if (!$value) {
            $this->message = __('validation.custom.verification.mobile_required');

            return false;
        }

        if ($this->isMobile($attribute, $value)) {
            return true;
        }
        $this->message = __('validation.custom.verification.mobile_invalid');

        return false;
        // FIXME 未开发 email verification
        //        return $this->isEmail($attribute, $value);
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
        return $this->message;
    }
}
