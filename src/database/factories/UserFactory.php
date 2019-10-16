<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
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
        "firstname" => $faker->firstName(),
    	"lastname" => $faker->lastName(),
        'email' => $faker->unique()->safeEmail,
        'contact_number' => $faker->randomNumber(5).$faker->randomNumber(5),
        'password' => 'password',
    ];
});
