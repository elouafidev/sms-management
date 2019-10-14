<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ScheduledSms;
use Faker\Generator as Faker;

$factory->define(ScheduledSms::class, function (Faker $faker) {
    return [
        'phone_number' => '081228892803',
        'sms_content' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'day' => $faker->numberBetween(1, 30),
        'time' => $faker->time($format = 'H:i:00', $max = 'tomorrow'),
        'repeat' => $faker->numberBetween(0, 1),
        'sent_at' => null,
        'CreatorID' => 1
    ];
});
