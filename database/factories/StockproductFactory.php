<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stockproduct;
use Faker\Generator as Faker;

$factory->define(Stockproduct::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName. $faker->firstName . rand(1,100000),
        'slug' => str_slug($faker->firstName . rand(1,10000), "-"),
        'category_id' => rand(1,251),
    ];
});
