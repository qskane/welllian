<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerificationCode extends Model
{
    use SoftDeletes;

    protected $fillable = ['verification', 'code'];

    public function overloaded($verification)
    {
        return (boolean)VerificationCode::where(compact('verification'))
            ->where('created_at', '>', Carbon::make('-1 minute'))
            ->count();
    }

}
