<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        factory(App\Models\User::class, 10)->create()->each(function ($u) {
        //            $u->save();
        //        });

        \App\Models\User::insert([
            [
                'id' => 1,
                'name' => 'qskane',
                'mobile' => '15888888888',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
            ],
            [
                'id' => 2,
                'name' => 'official user',
                'mobile' => '15811111111',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
            ],
        ]);
    }
}
