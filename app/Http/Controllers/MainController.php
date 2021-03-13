<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    public function index(){
    	/* debugging 
    	// $x= env("APP_NAME");

    	// dd($x, env("APP_NAME"), config("app.name"));
    	// return ($x);
		
		*/

		
		// applying dynamic scopes 
    	$products= Product::available();
		
    	return view('welcome')->with([
			'products'=>$products,
        ]);
    }
}
