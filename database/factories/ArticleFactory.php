<?php

use Faker\Generator as Faker;


$factory->define(\App\Models\Article::class, function (Faker $faker) {
    $categoryMax = \App\Models\ArticleCategory::max('id');

    ;
    return [
        'user_id' => 1,
        'title' => substr($faker->text(100), 0, mt_rand(20, 60)),
        'html' => $faker->text(),
        'markdown' => '',
        'article_category_id' => mt_rand(2, $categoryMax),
        'published' => true,
    ];
});
