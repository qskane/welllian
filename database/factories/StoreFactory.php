<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Store::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'origin' => $faker->url,
        'mall_id' => function () {
            return App\Models\Mall::inRandomOrder()->first()->id;
        },
    ];
});
