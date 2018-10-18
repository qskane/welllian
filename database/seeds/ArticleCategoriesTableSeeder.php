<?php

use Illuminate\Database\Seeder;

class ArticleCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id' => 1, 'name' => 'document', 'children' =>
                [
                    ['id' => 2, 'name' => 'TV & Home Theather'],
                    ['id' => 3, 'name' => 'Tablets & E-Readers'],
                    ['id' => 4, 'name' => 'Computers', 'children' => [
                        ['id' => 5, 'name' => 'Laptops', 'children' => [
                            ['id' => 6, 'name' => 'PC Laptops'],
                            ['id' => 7, 'name' => 'Macbooks (Air/Pro)'],
                        ]],
                        ['id' => 8, 'name' => 'Desktops'],
                        ['id' => 9, 'name' => 'Monitors'],
                    ]],
                    ['id' => 10, 'name' => 'Cell Phones'],
                ],
            ],
        ];

        \App\Models\ArticleCategory::buildTree($categories);
    }
}
