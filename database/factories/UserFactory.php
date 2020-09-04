<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'role_id' => 3,
        'user_number' => '00' . mt_rand(10, 90) . mt_rand(101, 199) . mt_rand(200, 999),
        'name' => $faker->name,
        'image' => 'assets/images/profiles/default.png',
        'email' => $faker->email,
        'password' => Hash::make('123456'),
        'address' => $faker->address,
        'status' => 0
    ];
});
