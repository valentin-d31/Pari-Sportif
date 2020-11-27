<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pari;
use Faker\Generator as Faker;

$factory->define(Pari::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'subtitle' => $faker->sentence(5),
        'coast' => $faker->areaCode,
        'description' => $faker->text,
        'img' => 'https://via.bd-placeholder.com/200x250'
    ];
});
