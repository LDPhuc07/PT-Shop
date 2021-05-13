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
    Route::get('/dashboards', 'DashboardController@index')->name('admin.dashboards');
    Route::get('/products', 'SanPhamController@index')->name('admin.products');
    Route::get('/products/create', 'SanPhamController@create')->name('admin.products.create');
    Route::get('/producers', 'NhaSanXuatController@index')->name('admin.producers');
    Route::get('/producers/create', 'NhaSanXuatController@create')->name('admin.producers.create');
    Route::get('accounts', 'TaiKhoanController@index')->name('admin.accounts');
    Route::get('accounts/lock/{id}', 'TaiKhoanController@lock')->name('admin.lockAccounts');
    Route::get('accounts/unlock/{id}', 'TaiKhoanController@unlock')->name('admin.unlockAccounts');
    Route::get('/login', 'TaiKhoanController@getDangNhapAdmin')->name('admin.accounts.login');
    Route::post('/login', 'TaiKhoanController@postDangNhapAdmin');
    Route::get('/logout', 'TaiKhoanController@dangXuatAdmin'); 
    Route::get('/sign-up','TaiKhoanController@getDangKyAdmin')->name('admin.accounts.sign-up');
    Route::post('/sign-up','TaiKhoanController@postDangKyAdmin');
    
});

Route::get('/insert', function() {
    DB::table('tai_khoans')->insert(['ho_ten'=>'Lê Đức Phú', 'password' => bcrypt('3456789'), 'email' => 'ldp@gmail.com', 'so_dien_thoai' => '0366753798', 'admin' => false]);
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
