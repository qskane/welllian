<?php

namespace App\Events;


use App\Contracts\HasWallet;
use App\Models\Media;
use App\Models\Wallet;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class MediaSaved implements HasWallet
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;

    public function __construct(Media $model)
    {
        $this->userId = $model->user_id;
    }

    public function wallet()
    {
        return Wallet::owner($this->userId)->first();
    }
}
