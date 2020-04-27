<?php

/** @var Factory $factory */

use App\Model\Bus;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Bus::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->text(5),
        'capacity' => 12
    ];
});
