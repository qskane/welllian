<?php

namespace App\Models\Concerns;


use App\Events\WalletCoinUpdated;
use App\Models\Wallet;
use App\Models\WalletLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait WalletTransfer
{

    public function transfer($from, $to, $coin, $force = false, $remark = '')
    {
        $status = false;
        $unpaid = 0;
        $fromWallet = Wallet::find($from);
        $toWallet = Wallet::find($to);

        if (!$fromWallet || !$toWallet) {
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

        if ($toWallet->unpaid > 0) {
            if ($toWallet->unpaid >= $coin) {
                $toWallet->unpaid -= $coin;
            } else {
                $toWallet->coin += ($coin - $toWallet->unpaid);
                $toWallet->unpaid = 0;
            }
        } else {
            $toWallet->coin += $coin;
        }

        $fromWallet->coin -= $coin;
        if ($unpaid > 0) {
            $fromWallet->unpaid += $unpaid;
        }

        DB::beginTransaction();
        try {
            $toWallet->save();
            $fromWallet->save();
            WalletLog::create(compact('from', 'to', 'coin', 'remark', 'unpaid'));
            DB::commit();
            $status = true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
        }

        event(new WalletCoinUpdated($from));
        event(new WalletCoinUpdated($to));

        return $status;
    }

}
