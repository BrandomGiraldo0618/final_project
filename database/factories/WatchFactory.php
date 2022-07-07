<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Watch;
use Faker\Generator as Faker;

$factory->define(Watch::class, function (Faker $faker) {
    return [
        'watch_name' => $faker-> sentence(2),
        'slug' => $faker-> slug(),
        'watch_description' => $faker-> text(200),
        'watch_material' => $faker-> sentence(4),
        'category_id' => function (array $post) {
            return Category::inRandomOrder()->first()->id;
        },
    ];
});
