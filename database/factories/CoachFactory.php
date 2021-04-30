<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coach;
use Faker\Generator as Faker;

$factory->define(Coach::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'bio' => $faker->text,
        'job_title' => $faker->jobTitle,
        'fb_url' => $faker->url,
        'in_url' => $faker->url,
        'y_url' => $faker->url,
        'insta_url' => $faker->url
    ];
});
