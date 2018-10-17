<?php

use Illuminate\Database\Seeder;

class ArticleCategoriesTableSeeder extends Seeder
{
    public function run()
    {

        factory(App\Models\ArticleCategory::class, 10)->create()->each(function ($category) {
            $has = App\Models\ArticleCategory::count();
            if ($has > 1) {
                $category->parent_id = mt_rand(0, 2);
            }
            $category->save();
        });

    }
}
