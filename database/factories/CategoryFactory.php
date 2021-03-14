<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;


$factory->define(Category::class, function (Faker $faker) {
    $category = array(
            'mobiles' => 'Mobile phone',
            'tv' => 'TV products',
            'books' => 'Books'
    );
    $code = array_rand($category, 1);
    return [
        'title' => $category[$code],
        'code' => $code
    ];
});
