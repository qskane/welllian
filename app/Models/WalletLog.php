<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletLog extends Model
{

    protected $fillable = [
        'from_user_id',
        'from_wallet_id',
        'to_user_id',
        'to_wallet_id',
        'coin',
        'remark',
        'unpaid',
        'text',
        'wallet_log_category_id',
        'serial_number',
        'created_at',
    ];

    public $timestamps = false;

    public function scopeTo($query, $walletId)
    {
        return $query->where('to_wallet_id', $walletId);
    }

    public function fromWallet()
    {
        return $this->belongsTo(Wallet::class, 'from_wallet_id', 'id');
    }

    public function toWallet()
    {
        return $this->belongsTo(Wallet::class, 'to_wallet_id', 'id');
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id', 'id');
    }

    public function walletLogCategory()
    {
        return $this->belongsTo(WalletLogCategory::class);
    }


}
