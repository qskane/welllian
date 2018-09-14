<?php

use Illuminate\Database\Seeder;

class MallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Mall::insert(
            [
                [
                    'name' => '京东商城',
                    'origin' => 'https://www.jd.com',
                    'logo' => '',
                ],
                [
                    'name' => '淘宝商城',
                    'origin' => 'https://www.taobao.com',
                    'logo' => '',
                ],
                [
                    'name' => '天猫商城',
                    'origin' => 'https://www.tmall.com',
                    'logo' => '',
                ],
            ]
        );
    }
}
