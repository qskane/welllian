<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Wallet extends Model
{
    use SoftDeletes;

    public function findOrFailByUser($id)
    {
        $wallet = Wallet::where('user_id', $id)->first();
        if (!$wallet) {
            abort(404);
        }

        return $wallet;
    }

}
