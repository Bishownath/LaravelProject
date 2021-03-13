<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function(){
// 	return view ('welcome');
// })->name('main');

Route::get('/','MainController@index')->name('main');

// // the first parameter should always be plural eg: products. Resource route will cover all the functonalities that are in the Products controller

// Route::get('products', 'ProductController@index')->name('products.index');

// Route::get('products/create', 'ProductController@create')->name('products.create');

// Route::post('products', 'ProductController@store')->name('products.store');

// Route::get('products/{product}','ProductController@show')->name('products.show');
// // the product can be shown using the title by defining title as shown below
// // Route::get('products/{product:title}','ProductController@show')->name('products.show');

// Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

// Route::match(['put','patch'],'products/{product}', 'ProductController@update')->name('products.update');

// Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');

// Route::get('products', 'ProductController@index')->middleware('auth');
// Route::get('products/{product}/edit', 'ProductController@index')->middleware('auth');

/*This resource route helps in calling all the functions of the products which includes all the CRUD method of product in this case*/
Route::resource('products', 'ProductController');
Route::resource('products.carts', 'ProductCartController')->only(['store', 'destroy']);

Auth::routes();

// category route
Route::resource('categories', 'CategoryController');

Route::resource('carts', 'CartController')->only(['index']);

Route::resource('users','UserController');

// Route::get('edit/user', 'UserController@edit')->name('users.edit');

Route::get('/home', 'HomeController@index')->name('home');