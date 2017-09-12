<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
    ];
});

$factory->state(App\Schedule::class, 'special', function ($faker){
    return [
        'date' => $faker->date(),
    ];
});
