<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Product::class, function (Faker $faker) {

    $originPrice = $faker->randomFloat(2, 1, 10000);
    $originBonusRate = $faker->randomFloat(2, 0.1, 1.0);
    $originBonus = $originPrice * $originBonusRate / 100;

    $bonusRate = $originBonusRate * (1 - config('web.bonus_rate'));
    $bonus = $originBonus * $bonusRate;
    $price = $originPrice - $bonus;

    $mallId = App\Models\Mall::inRandomOrder()->first()->id;
    $storeId = \App\Models\Store::where('mall_id', $mallId)->inRandomOrder()->first()->id;

    return [
        'name' => $faker->text(30),
        'price' => $price,
        'origin_price' => $originPrice,
        'bonus' => $bonus,
        'origin_bonus' => $originBonus,
        'bonus_rate' => $bonusRate,
        'origin_bonus_rate' => $originBonusRate,
        'origin' => $faker->url,
        'cover' => $faker->imageUrl(),
        'mall_id' => $mallId,
        'store_id' => $storeId,
    ];
});
//$table->increments('id');
//$table->string('name');
//$table->decimal('price');
//$table->decimal('origin_price');
//$table->decimal('bonus');
//$table->decimal('origin_bonus');
//$table->string('origin');
//$table->string('cover');
//$table->unsignedInteger('mall_id');
//$table->unsignedInteger('store_id');
//$table->timestamps();
//$table->softDeletes();
