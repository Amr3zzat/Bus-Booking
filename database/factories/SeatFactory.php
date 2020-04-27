<?php

/** @var Factory $factory */

use App\Model\Seat;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Seat::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->text(5),
    ];
});
