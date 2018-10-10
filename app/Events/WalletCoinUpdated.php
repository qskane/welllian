<?php

namespace App\Events;

use App\Contracts\HasWallet;
use App\Models\Wallet;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class WalletCoinUpdated implements HasWallet
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;

    /**
     * Create a new event instance.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return Wallet | null
     */
    public function wallet()
    {
        return Wallet::find($this->id);
    }

}
