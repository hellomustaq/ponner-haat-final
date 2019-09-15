<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'name' => 'product-4.jpg',
        'product_id' => $faker->numberBetween($min=41,$max=90),
    ];
});
