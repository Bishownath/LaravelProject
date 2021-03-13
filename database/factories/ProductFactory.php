<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*
	In the command prompt, as this is php version 7, we need to start 

1. php artisan tinker 
2. factory('App\Product')->make();
3. for the count, factory('App\Product', 5)->make();

In version 8, this will be 
App\Product::factory()->make();
for the count in laravel 8, App\Product::factory()->count(5)->make(); //5 is for generating 5 data


*/


use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $this->faker->sentence(3),
        'description' => $this->faker->paragraph(1),
        'price' => $this->faker->randomFloat($MaxDecimals =2, $min = 3, $max = 100),
        'stock' => $this->faker->numberBetween(1,10),
        'status' => $this->faker->randomElement(['available','unavailable']),
        'category_id'=>$this->faker->unique()->numberBetween(1, 50),
        
        
    ];
});

