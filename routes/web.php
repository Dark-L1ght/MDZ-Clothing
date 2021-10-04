<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'LandingPageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shop', 'ShopController@index');

Route::get('/cart', 'CartController@index');

Route::get('/shop/detail/{id}', 'ShopController@show');

Route::get('/shop/category/{id}', 'ShopController@category');

Route::post('/cart/store', 'CartController@store');

Route::patch('/cart/{id}', 'CartController@update');

Route::delete('/cart/{id}', 'CartController@delete');

Route::post('/checkout', 'CheckoutController@store');

Route::get('/admin', 'AdminController@index');

Route::get('/add', 'AdminController@addproduct');

Route::post('/tambahproduk', 'AdminController@add');

Route::get('/product', 'AdminController@view');

Route::get('/product/update/{id}', 'AdminController@updateview');

Route::delete('/product/{id}', 'AdminController@deleteproduct');

Route::post('/product/update/{id}', 'AdminController@updateproduct');

Route::get('/user', 'AdminController@viewuser');

Route::delete('/user/{id}', 'AdminController@deleteuser');

Route::get('user/update/{id}', 'AdminController@updateuserview');

Route::post('user/update/{id}', 'AdminController@updateuser');