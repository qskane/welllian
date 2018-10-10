<?php

namespace App\Models;

use App\Models\Concerns\HasOwner;
use App\Models\Concerns\WalletTransfer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes, WalletTransfer, HasOwner;

    protected $fillable = ['user_id'];

}
