<?php

namespace App\Models;

use App\Models\Concerns\HasOwner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes, HasOwner;

    protected $fillable = ['user_id'];

//    public function logs($pagination = true, $number = 10)
//    {
//        $query = WalletLog::walletRelation($this->id)->latest('id');
//
//        return $pagination ? $query->paginate($number) : $query->get();
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
