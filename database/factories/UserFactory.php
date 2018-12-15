<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'Jimmy Kiarie',
        'email' => 'jimlaravel@gmail.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$a40e5q1tdmFEwOhh3KwiweblRxB1ZmCEAb8Fb3E/sq7LYggnpWIrW', // password
        'remember_token' => str_random(10),
    ];
});
