<?php

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{

    public function run()
    {
        \App\Models\Media::insert([
            [
                'user_id' => 11,
                'name' => 'http://malllian-dev.com',
                'domain' => 'malllian',
                'promotion_url' => 'http://malllian-dev.com/',
                'logo' => 'https://img.alicdn.com/tfs/TB1EGNRRVXXXXazXVXXXXXXXXXX-271-123.png',
                'description' => 'fake description',
                'key' => '8wz0u8ekgoi2zwut',
                'secret' => '9qckzt4ameubsapf',
                'verification_key' => '5P9xLbvLJoUP5IheLt2cIxmkdUiRaMV6',
                'verified' => 1,
                'providing' => 1,
                'consuming' => 1,
                'consume_bid' => 1,
            ],
            [
                'user_id' => 11,
                'name' => 'http://baidu.com',
                'domain' => 'baidu.com',
                'promotion_url' => 'http://baidu.com/',
                'logo' => 'http://img4.imgtn.bdimg.com/it/u=1494157840,1431419928&fm=200&gp=0.jpg',
                'description' => 'fake baidu description',
                'key' => '8wz0u8e7goiszwut',
                'secret' => '9qckzt4ameubsapf',
                'verification_key' => '5P9xLbvLJoUP5IheLt2cIxmkdUiRaMV6',
                'verified' => 1,
                'providing' => 1,
                'consuming' => 1,
                'consume_bid' => 2,
            ],
            [
                'user_id' => 11,
                'name' => 'http://baidu.com',
                'domain' => 'cool name',
                'promotion_url' => 'http://baidu.com/',
                'logo' => 'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=3904778016,943478294&fm=200&gp=0.jpg',
                'description' => 'fake baidu description',
                'key' => '8wz0u8e4goiszwut',
                'secret' => '9qckzt4ameubsapf',
                'verification_key' => '5P9xLbvLJoUP5IheLt2cIxmkdUiRaMV6',
                'verified' => 1,
                'providing' => 1,
                'consuming' => 1,
                'consume_bid' => 2,
            ],
            [
                'user_id' => 11,
                'name' => 'http://baidu.com',
                'domain' => 'cool name',
                'promotion_url' => 'touch',
                'logo' => 'https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=2209561420,3871521107&fm=200&gp=0.jpg',
                'description' => 'fake baidu description',
                'key' => '8wz0u8ek2oiszwut',
                'secret' => '9qckzt4ameubsapf',
                'verification_key' => '5P9xLbvLJoUP5IheLt2cIxmkdUiRaMV6',
                'verified' => 1,
                'providing' => 1,
                'consuming' => 1,
                'consume_bid' => 2,
            ],
        ]);

    }

}
