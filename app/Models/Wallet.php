<?php

namespace App\Models;

use App\Scopes\OwnerScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Wallet extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OwnerScope);
    }

    public function transfer($from, $to, $coin, $force = false, $remark = '')
    {
        $status = false;
        $unpaid = 0;
        $fromWallet = Wallet::find($from);

        if (!$fromWallet) {
            return $status;
        }

        if ($fromWallet->coin < $coin) {
            if (!$force) {
                return $status;
            }
            $remark = $remark ?: __('wallet.force_transfer_coin_remark', ['origin' => $coin, 'current' => $fromWallet->coin]);
            $unpaid = $coin - $fromWallet->coin;
            $coin = $fromWallet->coin;
        }

        if ($coin === 0) {
            return $status;
        }

        DB::beginTransaction();
        try {
            Wallet::where('id', $from)->decrement('coin', $coin);
            Wallet::where('id', $to)->increment('coin', $coin);
            WalletLog::create(compact('from', 'to', 'coin', 'remark', 'unpaid'));
            if ($unpaid > 0) {
                Wallet::where('id', $from)->increment('unpaid', $unpaid);
            }
            DB::commit();
            $status = true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
        }

        return $status;
    }


}
