<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Carbon\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


// as this is laravel 7.x, so i am using randomElement by passing path in an array.
$factory->define(Image::class, function (Faker $faker) {
    $filename= $this->faker->numberBetween(1, 10). '.jpg';
    // $filenameProduct= $this->faker->numberBetween(1, 10). '.jpg';
    // $filenameUser= $this->faker->numberBetween(1, 6). '.jpg';

    return [
        // 'path'=>$this->faker->randomElement(["img/products/{$filenameProduct}", "img/users/{$filenameUser}"]),
        'path'=>$this->faker->unique()->regexify("/^ $filename-[a-z]{2}"),
        // 'path'=> "img/products/{$filename}",
    ];
});





// in Laravel 8.x, this method is used ----start
// class ImageFactory extends Factory{
//     protected $model= Image::class;

//     public function definition(){
//         $filename= $this->faker->numberBetween(1, 10). '.jpg';
//         return [
//             'path'=> "img/products/{$filename}",
//         ];
//     }
//     public function user(){
//         $filename= $this->faker->numberBetween(1, 6). '.jpg';
//         return [
//             'path'=> "img/users/{$filename}",
//         ];
//     }
// }
// end

// $factory->define(Image::class,'products', function (Faker $faker) {
//     $filename= $this->faker->numberBetween(1, 10). '.jpg';
//     return [
//         'path'=> "img/products/{$filename}",
//         // 'path'=> "img/users/{$filename}",
//     ];
// });

// $factory->define(Image::class,'users', function (Faker $faker) {
//     $filename= $this->faker->numberBetween(1, 6). '.jpg';
//     return $this->state([
//         // 'path'=> "img/products/{$filename}",
//         'path'=> "img/users/{$filename}",
//     ]);
// });



// $images = ['products', 'users'];


// $factory->define(Image::class, function (Faker $faker) use($images) {
//     $filename= $this->faker->numberBetween(1,10). '.jpg';
//     return [
//         'path'=> "img/{$images}/{$filename}",
//         // 'path'=> "img/users/{$filename}",
//     ];   
// });





