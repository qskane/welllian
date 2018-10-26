<?php

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{
    public function run()
    {
        $this->menu();
    }



    //9	    0	0	Resource	fa-bars
    //10	9	0	Article	    fa-bars	                 resource/article
    //11	9	0	Article category	 fa-bars	resource/article-category
    //12	9	0	template	fa-bars	              resource/template
    //13	9	0	User	    fa-bars	     resource/user


    protected function menu()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();

        $insert = [
            [
                'id' => 9,
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Resource',
                'icon' => '',
                'uri' => '',
            ],
            [
                'id' => 10,
                'parent_id' => 9,
                'order' => 0,
                'title' => 'Article Category',
                'icon' => 'fa-bars',
                'uri' => 'resource/article-category',
            ],
            [
                'id' => 11,
                'parent_id' => 9,
                'order' => 0,
                'title' => 'Article',
                'icon' => 'fa-bars',
                'uri' => 'resource/article',
            ],
            [
                'id' => 12,
                'parent_id' => 9,
                'order' => 0,
                'title' => 'Feedback',
                'icon' => 'fa-bars',
                'uri' => 'resource/feedback',
            ],

            [
                'id' => 13,
                'parent_id' => 9,
                'order' => 0,
                'title' => 'Media',
                'icon' => 'fa-bars',
                'uri' => 'resource/media',
            ],

            [
                'id' => 14,
                'parent_id' => 9,
                'order' => 0,
                'title' => 'Scheme',
                'icon' => 'fa-bars',
                'uri' => 'resource/scheme',
            ],

            [
                'id' => 15,
                'parent_id' => 9,
                'order' => 0,
                'title' => 'Template',
                'icon' => 'fa-bars',
                'uri' => 'resource/template',
            ],

            [
                'id' => 16,
                'parent_id' => 9,
                'order' => 0,
                'title' => 'User',
                'icon' => 'fa-bars',
                'uri' => 'resource/user',
            ],

            [
                'id' => 17,
                'parent_id' => 9,
                'order' => 0,
                'title' => 'Wallet',
                'icon' => 'fa-bars',
                'uri' => 'resource/wallet',
            ],
            [
                'id' => 18,
                'parent_id' => 9,
                'order' => 0,
                'title' => 'Wallet Log Category',
                'icon' => 'fa-bars',
                'uri' => 'resource/wallet-log-category',
            ],
            [
                'id' => 19,
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Log',
                'icon' => 'fa-bars',
                'uri' => 'log',
            ],


            [
                'id' => 20,
                'parent_id' => 19,
                'order' => 0,
                'title' => 'League Api Log',
                'icon' => 'fa-bars',
                'uri' => 'log/league-api-log',
            ],

            [
                'id' => 21,
                'parent_id' => 19,
                'order' => 0,
                'title' => 'League Log',
                'icon' => 'fa-bars',
                'uri' => 'log/league-log',
            ],
            [
                'id' => 22,
                'parent_id' => 19,
                'order' => 0,
                'title' => 'Wallet Log',
                'icon' => 'fa-bars',
                'uri' => 'log/wallet-log',
            ],
        ];

        $insert = array_map(function (&$value) use ($now) {
            $value['created_at'] = $value['updated_at'] = $now;

            return $value;
        }, $insert);

        \Encore\Admin\Auth\Database\Menu::insert($insert);
    }

}
