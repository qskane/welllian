<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerificationCodeRequest;
use App\Models\VerificationCode;
use App\Rules\VerificationAble;

class SupportController extends Controller
{

    public function verificationCode(VerificationCodeRequest $request)
    {
        $verification = $request->get('verification');

        // FIXME send verification code
        if ((new VerificationAble)->isEmail('verification', $verification)) {

        } else if ((new VerificationAble)->isMobile('verification', $verification)) {

        } else {
            // FIXME handle exception
            throw new \Exception('Internal exception');
        }


        $code = mt_rand(100000, 999999);

        VerificationCode::create(compact('verification', 'code'));
    }


}
