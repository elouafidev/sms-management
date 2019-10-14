<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone_number' => $faker->phoneNumber,
        'note' => $faker->sentence(2)
    ];
});
