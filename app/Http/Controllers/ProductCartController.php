<?php

namespace App\Http\Controllers;

use session;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Services\CartServices;
use Illuminate\Support\Facades\Cookie;

class ProductCartController extends Controller
{

    public $cartServices;

    public function __construct(CartServices $cartServices)
    {
        $this->cartServices= $cartServices;
    }
        


    /**
     * Display a listing of the resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {

        // dd('in cart store');
        // $cart= Cart::create();

        // Using a cookie to store the product in a cart
        $cart= $this->cartServices->getFromCookieOrCreate();

        $quantity= $cart->products()
            ->find($product->id)
            ->pivot
            ->quantity ?? 0 ;

            // using sync without detaching in order to add the product in same cart 
        $cart->products()->syncWithoutDetaching([
            $product->id => ['quantity'=> $quantity + 1],
        ]);

        // session()->put('cart', $cart);

        $cookie = $this->cartServices->makeCookie($cart);


        return redirect()->back()->cookie($cookie)->with('success',"Product {$cart->id} has been added to cart successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Cart $cart)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Cart $cart)
    {
        // dd('In Destroy');

        // $product->carts()->detach();
        // $product->delete();


        $cart->products()->detach($product);
        return redirect()
            ->back()
            ->withSuccess("Successfully removed product of id {$product->id} from cart.");
}

    // public function getFromCookieOrCreate(){
    //     $cartID= Cookie::get('cart');
    //     $cart= Cart::find($cartID);
        
    //     return $cart ?? Cookie::create();
        
    // }
}
