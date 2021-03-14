<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => rand(1, 3),
        'title' => $faker->word, 
        'description' => $faker->sentence, 
        'price' => rand(200, 3000)
    ];
});