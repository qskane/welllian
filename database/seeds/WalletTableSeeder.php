<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class WalletTableSeeder extends Seeder
{

    public function run()
    {
        \App\Models\Wallet::create([
            'user_id' => config('web.official_user_id'),
            'coin' => 1000,
            'unpaid' => 0,
        ]);

        $users = User::where('id', '<>', config('web.official_user_id'))->get();
        
        foreach ($users as $user) {
            wallet()->initial($user);
        }
    }

}
