<?php

use App\User;
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
        'AgentName' => $faker->name,
        'GroupID' => $faker->numberBetween($min = 1, $max = 7),

        'IsAdmin' => $faker->numberBetween($min = 0, $max = 1),
        'IsActive' => $faker->numberBetween($min = 0, $max = 1),

        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

    ];
});

$factory->define(App\WizMobAppDocument::class, function (Faker $faker) {
    return [
        'DocType' => $faker->numberBetween($min = 0, $max = 8),
        'DocName' => $faker->word,
        'AccountName' => $faker->name,
        'DocDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'ExclAmt' => $faker->numberBetween($min = 7000, $max = 90000),
        'InclAmt' => $faker->numberBetween($min = 7000, $max = 90000),
        'VATAmt' => $faker->numberBetween($min = 7000, $max = 90000),
        'Quantity' => $faker->numberBetween($min = 1, $max = 20),
        'Price' => $faker->numberBetween($min = 1000, $max = 10000),
        'Total' => $faker->numberBetween($min = 7000, $max = 90000),
        'AppStatus' => $faker->numberBetween($min = 0, $max = 2),
        'RejectionReason' => $faker->sentence($nbWords = 5, $variableNbWords = true),
    ];
});

$factory->define(App\WizMobAppStatus::class, function (Faker $faker) {
    return [

        'StatDesc' => $faker->word,
    ];
});

$factory->define(App\WizMobAppWorkFlow::class, function (Faker $faker) {
    return [
        'DocType' => $faker->numberBetween($min = 0, $max = 8),
        // 'DocType' => $faker->unique()->randomNumber(),
        'SequenceID' => json_encode($faker->shuffle(array(1, 2, 3, 4, 5, 6, 7))),
        'GroupID' => $faker->numberBetween($min = 1, $max = 6),
        'AgentID' => $faker->numberBetween($min = 1, $max = 10),
        'LastGroup' => $faker->numberBetween($min = 1, $max = 6),
        'LastAgent' => $faker->numberBetween($min = 1, $max = 10),
        'NextGroup' => $faker->numberBetween($min = 1, $max = 6),

    ];
});

$factory->define(App\WizMobAppGroup::class, function (Faker $faker) {
    return [
        'GroupName' => $faker->word,
    ];
});
