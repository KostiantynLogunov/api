<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [

        'product_id' => function() {
            return \App\Model\Product::all()->random();
        },
        'cutomer' => $faker->name,
        'review' => $faker->paragraph,
        'start' => $faker->numberBetween(0, 5),
    ];
});
