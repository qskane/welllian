<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    protected $fillable = ['verification', 'code', 'ip'];

    public function verificationOverloaded($verification)
    {
        $seconds = config('web.verification_code.refresh_seconds');

        return (boolean)VerificationCode::where(compact('verification'))
            ->where('created_at', '>', Carbon::make("-$seconds seconds"))
            ->count();
    }

    public function ipOverloaded($ip)
    {
        $seconds = config('web.verification_code.ip_overload_seconds');
        $limit = config('web.verification_code.ip_overload_limit');

        return VerificationCode::where(compact('ip'))
                ->where('created_at', '>', Carbon::make("-$seconds seconds"))
                ->count() >= $limit;
    }


}
