<?php

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{

    public function run()
    {
        \App\Models\Media::insert([
            [
                'user_id' => 51,
                'name' => 'http://malllian-dev.com',
                'domain' => 'malllian-dev.com',
                'promotion_url ' => 'http://malllian-dev.com/',
                'logo' => '	/img/google.png',
                'description' => 'fake description',
                'key' => '8wz0u8ekgoiszwut',
                'secret' => '9qckzt4ameubsapf',
                'verification_key' => '5P9xLbvLJoUP5IheLt2cIxmkdUiRaMV6',
                'verified' => 1,
                'providing' => 1,
                'consuming' => 1,
                'consume_bid' => 1,
            ],
            [
                'user_id' => 51,
                'name' => 'http://baidu.com',
                'domain' => 'baidu.com',
                'promotion_url ' => 'http://baidu.com/',
                'logo' => '	/img/google.png',
                'description' => 'fake baidu description',
                'key' => '8wz0u8ekgoiszwut',
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
