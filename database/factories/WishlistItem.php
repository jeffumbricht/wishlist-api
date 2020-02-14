<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\WishlistItem;
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

$factory->define(WishlistItem::class, function (Faker $faker) {
    static $user_id;
    static $randomUser;

    return [
        'title' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'link' => $faker->url,
        'user_id' => $user_id,
        // Generate buyer that is not current user
        'buyer_id' => function (array $user) {
            $randomUser = $user['user_id'];
            while ($randomUser === $user['user_id']) {
                $randomUser = User::inRandomOrder()->first()->id;
            }
            return $randomUser;
        }
    ];
});
