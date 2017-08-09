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
        'password' => $password ?: $password = bcrypt('asdasd'),
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
        'slug_en' => str_random(5),
        'slug_ar' => str_random(5),
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'is_approved' => '1',
    ];
});

$factory->define(App\Slider::class, function (Faker\Generator $faker) {

    return [

        'image' => $faker->imageUrl(800, 400),

        'order' => $faker->unique()->numberBetween(1, 5),
    ];

});

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [

        'parent_id' => '0',
        'name_en' => $faker->name,
        'name_ar' => $faker->name,
        'description_en' => $faker->text(50),
        'description_ar' => $faker->text(50),
        'slug_en' => $faker->word,
        'slug_ar' => $faker->word
    ];

});

$factory->define(App\Newsletter::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];

});

$factory->define(App\Coupon::class, function (Faker\Generator $faker) {

    return [
        'percentage' => $faker->numberBetween(5, 20),
        'code' => $faker->randomLetter . $faker->randomLetter . $faker->randomLetter . $faker->randomLetter,
        'minimum_charge' => $faker->numberBetween(100, 200),
        'expiry_date' => new \Carbon\Carbon('+2 week'),
        'quantity_left' => rand(0,100)
    ];

});


$factory->define(App\Product::class, function (Faker\Generator $faker) use ($factory) {

    return [
        'store_id' => \App\Store::all()->random()->id,
        'sku' => $faker->randomLetter . $faker->randomLetter . $faker->randomLetter . $faker->randomLetter.$faker->randomNumber(),
        'name_en' => $faker->name,
        'name_ar' => $faker->name,
        'slug_en' => $faker->word,
        'slug_ar' => $faker->word,
    ];

});

$factory->define(App\ProductDetail::class, function (Faker\Generator $faker) use ($factory) {

    return [
        'product_id' => \App\Product::all()->random()->id,
        'weight' => $faker->numberBetween(50, 200),
        'is_sale' => $faker->boolean(90),
        'sale_price' => rand(1,100),
        'price' => rand(101, 200),
        'start_sale_date' =>\Carbon\Carbon::parse($faker->dateTimeBetween('-1 week','now')->format('d-m-Y')),
        'end_sale_date' => \Carbon\Carbon::parse($faker->dateTimeBetween('now','+1 week')->format('d-m-Y')),
        'quantity' => $faker->numberBetween(50, 100),
        'description_en' => $faker->text(20),
        'description_ar' => $faker->text(20),
        'main_image' => 'test.jpg',
    ];

});

$factory->define(App\ProductImage::class, function (Faker\Generator $faker) use ($factory) {

    return [
        'product_id' => \App\Product::all()->random()->id,
        'image' => 'test.jpg',
    ];

});

$factory->define(App\Order::class, function (Faker\Generator $faker) use ($factory) {

    return [
        'user_id' => \App\User::all()->random()->id,
        'sale_amount' => $faker->numberBetween(20, 50),
        'net_amount' => $faker->numberBetween(50, 200),
        'payment_method' => 'tab',
        'coupon_value' => 0,
        'order_status' => '-1',
        'captured_status' => '1',
        'invoice_id' => $faker->postcode,
        'order_email' => $faker->email,
        'order_address' => $faker->text(20),
        'delivery_date' => $faker->date(),
        'delivery_time' => $faker->text(20),
    ];

});

$factory->define(App\OrderDetail::class, function (Faker\Generator $faker) use ($factory) {

    return [
        'order_id' => \App\Order::all()->random()->id,
        'product_id' => \App\Product::all()->random()->id,
        'price' => $faker->numberBetween(20, 50),
        'sale_price' => $faker->numberBetween(20, 50),
        'quantity' => $faker->numberBetween(50, 100),
    ];

});