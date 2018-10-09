<?php

namespace App\Listeners;

use App\Events\WalletCoinUpdated;
use App\Models\Media;

class MediaConsumableListener
{

    /**
     * @param $event WalletCoinUpdated
     */
    public function handle($event)
    {
        $wallet = $event->wallet();

        if (!$wallet) {
            return;
        }

        Media::owner($wallet->user_id)
            ->verified()
            ->consuming()
            ->consumable(false)
            ->where('consume_bid', '<=', $wallet->coin)
            ->update(['consumable' => true]);

        Media::owner($wallet->user_id)
            ->verified()
            ->consuming()
            ->consumable(true)
            ->where('consume_bid', '>=', $wallet->coin)
            ->update(['consumable' => false]);
    }


}
