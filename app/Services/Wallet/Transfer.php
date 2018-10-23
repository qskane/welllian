<?php

namespace App\Services\Wallet;

use App\Events\WalletCoinUpdated;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletLog;
use Carbon\Carbon;
use DB;
use Log;

class Transfer
{

    /**
     * @var Wallet
     */
    protected $fromWallet;
    /**
     * @var Wallet
     */
    protected $toWallet;
    /**
     * @var User
     */
    protected $fromUser;
    /**
     * @var User
     */
    protected $toUser;
    protected $fromUserId;
    protected $toUserId;

    protected $coin = 1;
    protected $category;
    protected $remark = '';
    protected $force = false;

    protected $actualCoin;

    /**
     * @var WalletLog
     */
    protected $fromLog;

    /**
     * @var WalletLog
     */
    protected $toLog;

    public function run()
    {
        $status = false;
        if (!$this->isPermit()) {
            // Log::error('Required parameters include null value', ['location' => __METHOD__]);
            return false;
        }

        if (!$this->out($this->coin)) {
            // 余额不足
            return false;
        }

        $this->in($this->actualCoin);

        DB::beginTransaction();
        try {
            $this->fromWallet->save();
            $this->toWallet->save();
            $this->log();
            DB::commit();
            $status = true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
        }

        if ($status) {
            event(new WalletCoinUpdated($this->fromWallet->id));
            event(new WalletCoinUpdated($this->toWallet->id));
        }

        return $status;
    }


    protected function log()
    {
        $now = Carbon::now();
        $time = time();
        $rands = $this->randomNumber();

        WalletLog::insert([
            [
                'from_user_id' => $this->fromUserId,
                'to_user_id' => $this->toUserId,
                'from_wallet_id' => $this->fromWallet->id,
                'to_wallet_id' => $this->toWallet->id,
                'coin' => $this->actualCoin,
                'wallet_log_category_id' => $this->category,
                'unpaid' => $this->fromWallet->unpaid,
                'text' => __('wallet.transfer_in_text', ['name' => $this->fromUser->name, 'coin' => $this->actualCoin]),
                'remark' => $this->remark,
                'serial_number' => $time . $rands[0],
                'created_at' => $now,
            ],
            [
                'from_user_id' => $this->toUserId,
                'to_user_id' => $this->fromUserId,
                'from_wallet_id' => $this->toWallet->id,
                'to_wallet_id' => $this->fromWallet->id,
                'coin' => $this->actualCoin,
                'wallet_log_category_id' => $this->category,
                'unpaid' => $this->fromWallet->unpaid,
                'text' => __('wallet.transfer_out_text', ['name' => $this->toUser->name, 'coin' => $this->actualCoin]),
                'remark' => $this->remark,
                'serial_number' => $time . $rands[1],
                'created_at' => $now,
            ],
        ]);
    }

    protected function randomNumber($a = null)
    {
        $a = $a ?? mt_rand(10, 99);
        $b = mt_rand(10, 99);
        if ($a === $b) {
            return $this->randomNumber($a);
        }

        return [$a, $b];
    }


    protected function out($wantCoin)
    {
        $coin = $wantCoin;
        $unpaid = $this->fromWallet->unpaid;
        if ($unpaid > 0) {
            return false;
        }

        if ($this->fromWallet->coin < $wantCoin) {
            if (!$this->force) {
                return false;
            }

            $unpaid = $wantCoin - $this->fromWallet->coin;
            $coin = $this->fromWallet->coin;
            $this->remark = __('wallet.force_transfer_coin_remark', ['origin' => $wantCoin, 'current' => $coin]);
        }

        $this->actualCoin = $coin;
        $this->fromWallet->coin -= $coin;
        $this->fromWallet->unpaid += $unpaid;

        return true;
    }


    protected function in($coin)
    {
        $unpaid = $this->toWallet->unpaid;

        if ($unpaid >= $coin) {
            $coin = 0;
            $unpaid -= $coin;
        } else {
            $coin -= $unpaid;
            $unpaid = 0;
        }

        $this->toWallet->coin += $coin;
        $this->toWallet->unpaid = $unpaid;
    }

    protected function isPermit()
    {
        foreach ([$this->fromWallet, $this->toWallet, $this->fromUserId, $this->toUserId, $this->coin] as $item) {
            if (is_null($item)) {
                return false;
            }
        }

        return true;
    }

    protected function setWallet($wallet, $name)
    {
        $wallet = $wallet instanceof Wallet ? $wallet : Wallet::find($wallet);

        $this->{$name . 'Wallet'} = $wallet;
        $this->{$name . 'User'} = $wallet->user;
        $this->{$name . 'UserId'} = $wallet->user->id;
    }

    protected function setUser($user, $name)
    {
        $user = $user instanceof User ? $user : User::find($user);

        $this->{$name . 'User'} = $user;
        $this->{$name . 'UserId'} = $user->id;
        $this->{$name . 'Wallet'} = Wallet::owner($user->id)->first();
    }

    /**
     * @param $wallet
     * @return Transfer
     */
    public function fromWallet($wallet)
    {
        $this->setWallet($wallet, 'from');

        return $this;
    }

    /**
     * @param $wallet
     * @return Transfer
     */
    public function toWallet($wallet)
    {
        $this->setWallet($wallet, 'to');

        return $this;
    }

    /**
     * @param $user
     * @return Transfer
     */
    public function fromUser($user)
    {
        $this->setUser($user, 'from');

        return $this;
    }

    /**
     * @param $user
     * @return Transfer
     */
    public function toUser($user)
    {
        $this->setUser($user, 'to');

        return $this;
    }

    /**
     * @param $coin
     * @return Transfer
     */
    public function coin($coin)
    {
        $this->coin = (int)$coin;

        return $this;
    }

    /**
     * @param $category
     * @return Transfer
     */
    public function category($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @param $remark
     * @return Transfer
     */
    public function remark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * @param $force
     * @return Transfer
     */
    public function force($force)
    {
        $this->force = $force;

        return $this;
    }

}
