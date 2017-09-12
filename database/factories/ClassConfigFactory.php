<?php

use Faker\Generator as Faker;

$factory->define(App\ClassConfig::class, function (Faker $faker) {
    return [
        //
        'block' => $faker->numberBetween(1,6),
        'name' => $faker->word,
    ];
});
$factory->state(App\ClassConfig::class, 'single_day', function ($faker) {
    return [
        'day' => $faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']),
    ];
});