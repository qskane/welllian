<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class WalletTableSeeder extends Seeder
{

    public function run()
    {
        $users = User::select('id')->get();
        foreach ($users as $user) {
            wallet()->initial($user);
        }
    }

}
