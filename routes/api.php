<?php

use Illuminate\Http\Request;

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
Route::get('product','Api\ProductController@index');
Route::get('latest','Api\ProductController@sanphammoi');
Route::get('oldest','Api\ProductController@sanphamcu');
Route::get('priceAscending','Api\ProductController@giatangdan');
Route::get('priceDecrease','Api\ProductController@giagiamdan');
Route::get('nameBegin','Api\ProductController@tenbatdau');
Route::get('nameEnd','Api\ProductController@tenketthuc');
Route::get('bestseller','Api\ProductController@banchay');