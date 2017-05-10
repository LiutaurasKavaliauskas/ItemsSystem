<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\Item::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->colorName,
        'count' => $faker->randomDigit,
        'price' => $faker->randomFloat(),
        'category_id' => factory(\App\Models\Category::class)->create()->id,
    ];
});
