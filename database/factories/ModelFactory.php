<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'id' => $faker->firstName
    ];
});
$factory->define(App\Url::class, function ($faker) {
    return [
        'hits' => $faker->randomDigitNotNull,
        'url' => $faker->url,
        'shortUrl' => $faker->url
    ];
});
