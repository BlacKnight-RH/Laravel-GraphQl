<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name ,
        'author' => $faker->firstName ,
        'description' => $faker->text,
        'image' => $faker->imageUrl() ,
        'link' => $faker->url ,
        'featured' => random_int(0,1) ,
        'category_id' => Category::all()->random()->id,
    ];
});
