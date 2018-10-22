<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerificationCodeRequest;
use App\Models\VerificationCode;
use App\Rules\VerificationAble;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SupportController extends Controller
{

    public function verificationCode(VerificationCodeRequest $request)
    {
        $verification = $request->get('verification');

        $code = 000000;
        if ((new VerificationAble)->isMobile('verification', $verification)) {
            // FIXME send mobile verification code
            $code = mt_rand(100000, 999999);
        } else {
            Log::info('Wrong parameter', array_merge(['location' => __METHOD__, 'request' => $request->all()]));
            abort(403);
        }

        //    else if ((new VerificationAble)->isEmail('verification', $verification)) {
        //        Log::info('Wrong parameter', array_merge(['location' => __METHOD__, 'request' => $request->all()]));
        //        abort(403);
        //    }

        VerificationCode::create([
            'verification' => $verification,
            'code' => $code,
            'ip' => $request->ip()
        ]);
    }


}
