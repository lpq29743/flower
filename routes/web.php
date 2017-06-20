<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('flower');
});

Route::get('login', 'MemberController@login');
Route::post('login', 'MemberController@loginPost');
Route::get('register', 'MemberController@register');
Route::post('register', 'MemberController@registerPost');
Route::get('logout', 'MemberController@logout');

Route::get('flowerAdd', 'FlowerController@flowerAdd');
Route::post('flowerAdd', 'FlowerController@flowerAddPost');
Route::get('showFlower', 'FlowerController@showFlower');
Route::get('getFlowerImg/{name}', 'FlowerController@getFlowerImg');
Route::get('flowerDetail', 'FlowerController@flowerDetail');
Route::post('flowerUpdate', 'FlowerController@flowerUpdate');
Route::post('flowerDelete', 'FlowerController@flowerDelete');

Route::get('myCart', 'CartController@myCart');
Route::get('addgwch/{flowerID}', 'CartController@addgwch');
Route::post('cartUpdate', 'CartController@cartUpdate');
Route::post('cartDelete', 'CartController@cartDelete');
Route::get('cartClear', 'CartController@cartClear');

Route::get('order', 'OrderController@order');
Route::post('orderPost', 'OrderController@orderPost');
Route::get('showOrder', 'OrderController@showOrder');
Route::get('orderDetail', 'OrderController@orderDetail');
Route::get('orderUpdate/{orderID}', 'OrderController@orderUpdate');
Route::get('pingjia', 'OrderController@pingjia');
Route::post('pingjiaPost', 'OrderController@pingjiaPost');
Route::get('cancelOrder/{orderID}', 'OrderController@cancelOrder');
Route::get('payOrder/{orderID}', 'OrderController@payOrder');

Route::get('customerAdd', 'CustomerController@customerAdd');
Route::post('customerAddPost', 'CustomerController@customerAddPost');
Route::get('customerUpdate/{custID}', 'CustomerController@customerUpdate');
Route::get('customerDelete/{custID}', 'CustomerController@customerDelete');

Route::get('adminLogin', 'AdminController@adminLogin');
Route::post('adminLoginPost', 'AdminController@adminLoginPost');
Route::get('adminExit', 'AdminController@adminExit');
Route::get('adminIndex', 'AdminController@adminIndex');
Route::get('adminOrderList', 'AdminController@adminOrderList');
Route::post('adminUpdateDdzt', 'AdminController@adminUpdateDdzt');
Route::get('adminFlower', 'AdminController@adminFlower');