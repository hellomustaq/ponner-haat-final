<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'mother_category_id' => 5,
        'category_id' => $faker->numberBetween($min=18,$max=21),
        'sub_category_id' => $faker->numberBetween($min=39,$max=46),
        'quantity' => $faker->numberBetween($min=1,$max=10),
        'price_per_unit' => $price=$faker->numberBetween($min=500,$max=5000),
        'purchase_price' => $price -200,
        'discount' => $price=$faker->numberBetween($min=0,$max=5),
        'vat' => $price=$faker->randomElement($array = array ('5','10')),
        'availability' =>$faker->numberBetween($min=0,$max=1),
        'details' =>$faker->text($maxNbChars = 200),
        'specification' =>$faker->text($maxNbChars = 100),
        'warranty' =>$faker->text($maxNbChars = 50),
        'active' =>1,
        'note' =>$faker->text($maxNbChars = 10),
        'created_at' =>$faker->dateTime($max = 'now', $timezone = null),
        'updated_at' =>$faker->dateTime($max = 'now', $timezone = null),
    ];
});
