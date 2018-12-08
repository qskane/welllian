<?php

use Faker\Generator as Faker;


$factory->define(\App\Models\Article::class, function (Faker $faker) {
    $categoryMax = \App\Models\ArticleCategory::max('id');
    $lang = \App\Models\Language::inRandomOrder()->first();

    return [
        'user_id' => 1,
        'title' => substr($faker->text(100), 0, mt_rand(20, 60)),
        'key' => str_random(config('web.article.key_length')),
        'description' => $faker->realText(200),
        'html' => $faker->randomHtml(),
        'markdown' => '',
        'image' => $faker->imageUrl(),
        'origin' => mt_rand(0, 1) ? $faker->url : '',
        'language_code' => $lang->code,
        'article_category_id' => mt_rand(1, $categoryMax),
        'published' => true,
    ];
});
