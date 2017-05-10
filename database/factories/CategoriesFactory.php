<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->colorName
    ];
});
