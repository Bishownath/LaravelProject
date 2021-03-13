<?php

namespace App\Services;

use App\Cart;
use Illuminate\Support\Facades\Cookie;

class CartServices{

    protected $cookieName= 'cart';

    public function getFromCookie(){
        $cartID= Cookie::get('cart');
        return Cart::find($cartID); 
    }


    public function getFromCookieOrCreate(){
        $cart= $this->getFromCookie();
        return $cart ?? Cart::create();
        
    }

    public function makeCookie(Cart $cart){
        return Cookie::make('cart', $cart->id, 7 * 24 * 60);
    }

    public function countProducts(){
        $cart= $this->getFromCookie();

        $counter= collect([]);

        // $counter= Cookie::
        if ($cart != null) {
            return $cart->products->pluck('pivot.quantity')->sum();

        } 
        return 0;
    }
}
        
    

