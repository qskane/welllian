<?php

namespace App\Services\Wallet;


use App\Models\User;
use App\Models\Wallet;

class WalletService
{

    public function transfer()
    {
        return new Transfer;
    }

    public function initial(User $user)
    {
        /*
         *  Any better way to initial user wallet coin ?
         */

        Wallet::where('user_id', config('web.official_user_id'))->increment('coin', config('web.wallet.initial_coin'));;
        $wallet = Wallet::owner($user->id)->count();

        if (!$wallet && !(new Wallet(['user_id' => $user->id]))->save()) {
            return false;
        }

        return $this->transfer()
            ->fromUser(config('web.official_user_id'))
            ->toUser($user)
            ->coin(config('web.wallet.initial_coin'))
            ->category(config('web.wallet_log_category.system'))
            ->run();
    }

}
