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

Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboards', 'DashboardController@index');
    Route::get('/products', 'ProductController@index');
    Route::get('/products/create', function () {
        return view('admin.product.add_product');
    });
    Route::get('/login', 'TaiKhoanController@getDangNhapAdmin');
    Route::post('/login', 'TaiKhoanController@postDangNhapAdmin');
    Route::get('/sign-up', function() {
        return view('admin.sign_up');
    });
    
    Route::get('/accounts', function() {
        return view('admin.account.index');
    });
    
});

Route::get('/insert', function() {
    DB::table('tai_khoans')->insert(['ho_ten'=>'Lê Đức Phú', 'password' => bcrypt('34567'), 'email' => 'ldp@gmail.com', 'so_dien_thoai' => '0366753798', 'admin' => false]);
});

Route::get('/', function () {
    return view('pages.index');
});
Route::get('/products', function () {
    return view('pages.product');
});
Route::get('/product-details', function () {
    return view('pages.product_detail');
});
Route::get('/carts', function () {
    return view('pages.cart');
});
Route::get('/login', function () {
    return view('pages.login');
});
Route::get('/sign-up', function () {
    return view('pages.sign_up');
});
Route::get('/sign-up', function () {
    return view('pages.sign_up');
});
Route::get('/pay', function () {
    return view('pages.pay');
});
Route::get('/news', function () {
    return view('pages.news');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
