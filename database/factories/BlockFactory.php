<?php

use Faker\Generator as Faker;

$factory->define(App\Block::class, function (Faker $faker) {
    return [
        'start_time' => $faker->time(),
        'end_time' => $faker->time(),
    ];
});

$factory->state(App\Block::class, 'number', function ($faker) {
    return [
        'number' => $faker->numberBetween(1,7),
    ];
});

$factory->state(App\Block::class, 'name', function ($faker) {
    return [
        'name' => $faker->word,
    ];
});