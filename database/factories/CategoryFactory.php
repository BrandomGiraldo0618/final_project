<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker -> sentence(2),
        'slug' => $faker -> slug(),
        'description' => $faker -> text(200),
        'priority' => $faker -> numberBetween(1,10)
    ];
});
