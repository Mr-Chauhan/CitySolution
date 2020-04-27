<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use App\complains;

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

$factory->define(complains::class, function (Faker $faker) {
    return [
        'varName' => $faker->name,
        'varEmail' => $faker->unique()->safeEmail,
        'fkCateId' => $faker->numberBetween(1,2),
        'varTitle' => $faker->sentence(7,11),
        'varMessage' => $faker->sentence(100,500),
        'varImage' => $faker->image('public/images/complains',640,480, null, false),
        'chrStatus' => $faker->randomElement(['P','I','C']),
        'varAdminCmt' => $faker->sentence(100,500),
    ];
});

