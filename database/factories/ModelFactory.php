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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'api_token' => str_random(60),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {

    return [
        'country_code' => $faker->countryCode,
        'name_en' => $faker->name,
        'name_ar' => $faker->name,
        'currency_en' => $faker->currencyCode,
        'currency_ar' => $faker->currencyCode,
    ];
});

$factory->define(App\Store::class, function (Faker\Generator $faker) use ($factory) {

    return [
        'country_id' => \App\Country::find(1)->id ? \App\Country::find(1)->id : $factory->create(App\Country::class)->id,
        'name_en' => $faker->name,
        'name_ar' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'is_approved' => '1',
    ];
});
