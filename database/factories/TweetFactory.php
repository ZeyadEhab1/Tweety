<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use Faker\Generator as Faker;

// TODO: Use new factory syntax
$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'user_id'=> factory(\App\User::class),
        'body'=> $faker->sentence,

    ];
});
