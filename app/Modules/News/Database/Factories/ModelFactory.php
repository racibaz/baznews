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

$factory->define(App\Modules\News\Models\NewsCategory::class, function (Faker\Generator $faker) {

    return [
        'name'                  => $faker->name,
        'slug'                  => str_slug($faker->name),
        'is_cuff'               => 1,
        'is_active'             => 1
    ];
});


$factory->define(App\Modules\News\Models\News::class, function (Faker\Generator $faker) {

    return [
        'user_id'               => 1,
        'country_id'            => random_int(1,2),
        'city_id'               => random_int(1,3),
        'news_resource_id'      => 1,
        'title'                 => $faker->title,
        'slug'                  => str_slug($faker->title),
        'spot'                  => $faker->title,
        'content'               => $faker->paragraphs,
        'status'                => random_int(1,5),
        'band_news'             => 1,
        'box_cuff'              => 1,
        'is_cuff'               => 1,
        'break_news'            => 1,
        'is_comment'            => 1,
        'main_cuff'             => 1,
        'mini_cuff'             => 1,
        'is_active'             => 1
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {

    return [
        'name'                  => $faker->name,
        'password'              => $faker->password(1234),
        'status'                => 1,
        'remember_token'        => str_random(10),
        'created_at'            => $faker->dateTime,
        'updated_at'            => $faker->dateTime
    ];
});
