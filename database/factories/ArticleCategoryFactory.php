<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ArticleCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
    ];
});
