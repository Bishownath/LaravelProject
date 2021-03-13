<?php

// use App\Product;
/*
This is for laravel 7
        $product= factory('App\Product' ,5)->create();

For laravel 8, use App\Product
in function, $product= Product::factory(5)->create(); ;
*/

use App\Cart;
use App\User;
use App\Image;
use App\Order;
use App\Payment;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){

        
        $users= factory(User::class, 20)
            ->create()
            ->each(function($user){
                $image= factory(Image::class)
                    ->make();

                $user->image()->save($image);
                
            });
            
            $orders= factory(Order::class,15)
                ->make()
                ->each(function($order) use($users){
            
                $order->customer_id= $users->random()->id;
                $order->save();
                    
                $payment= factory(Payment::class)->make();
                $order->payment()->save($payment);
            
            });

            $carts= factory(Cart::class,20)->create();
            
            $products= factory(Product::class, 50)
                ->create()
                ->each(function($product) use($orders,$carts){
                   $order= $orders->random();
                   $order->products()->attach([
                       $product->id=> ['quantity'=>mt_rand(1,3)]
                   ]);

                  $cart= $carts->random();
                  $cart->products()->attach([
                      $product->id=> ['quantity'=>mt_rand(1,3)]
                  ]);

                  $images= factory(Image::class, mt_rand(2,4))->make();
                  $product->images()->saveMany($images);
                });
        }
    }


// $user= factory('App\User' ,20)->create();

// $order= factory('App\Order' ,10) 
//     ->make()
//     ->each(function($order) use($user){
//         $order->customer_id= $user->random()->id;
//         $order->save();

//         $payment= factory('App\Payment')->make();
//         $order->payment()->save($payment);

//     });
