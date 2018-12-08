<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Language::insert([
            [
                'id' => 1,
                'name' => '中文',
                'code' => 'zh_cn',
            ],
            [
                'id' => 2,
                'name' => 'English',
                'code' => 'en',
            ],
        ]);
    }
}
