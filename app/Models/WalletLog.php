<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletLog extends Model
{
    use SoftDeletes;
    protected $fillable = ['from', 'to', 'coin', 'remark', 'unpaid'];
}
