<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Rote kısmı düzenlencek prefix ve grouplama yapılacaktır..!

Route::Resource('admin/settings', 'App\Http\Controllers\Api\SettingsController');
Route::Resource('admin/adress', 'App\Http\Controllers\Api\AdressController');
Route::Resource('admin/site-uyeler', 'App\Http\Controllers\Api\SiteUyelerController');
Route::Resource('admin/site-contract', 'App\Http\Controllers\Api\SiteContractController');
Route::Resource('admin/site-product', 'App\Http\Controllers\Api\SiteProductController',['name' => 'product']);
Route::post('site-product/variants', 'App\Http\Controllers\Api\SiteProductController@getProductRequest',['name' => 'product-variants']);
Route::post('site-product/delete', 'App\Http\Controllers\Api\SiteProductController@deleteProcess',['name' => 'product-delete-porcess']);





