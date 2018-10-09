<?php

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletTableSeeder extends Seeder
{

    public function run()
    {
        $users = User::select('id')->get();
        foreach ($users as $user) {
            $wallet = Wallet::create(['user_id' => $user->id]);
            $wallet->coin = 1000;
            $wallet->save();
        }
    }

}
