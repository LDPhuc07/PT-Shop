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
    Route::get('/products', 'SanPhamController@indexAdmin')->name('admin.products');
    Route::get('/products/create', 'SanPhamController@create')->name('admin.products.create');
    Route::get('/producers', 'NhaSanXuatController@index')->name('admin.producers');
    Route::get('/producers/create', 'NhaSanXuatController@create')->name('admin.producers.create');
    Route::get('/accounts', 'TaiKhoanController@index')->name('admin.accounts');
    Route::get('/accounts/lock/{id}', 'TaiKhoanController@lock')->name('admin.lockAccounts');
    Route::get('/accounts/unlock/{id}', 'TaiKhoanController@unlock')->name('admin.unlockAccounts');
    Route::get('/accounts/change-password/{id}', 'TaiKhoanController@getDoiMatKhauAdmin')->name('admin.changPassword');
    Route::put('/accounts/change-password/{id}','TaiKhoanController@putDoiMatKhauAdmin');
    Route::get('/accounts/{id}/edit','TaiKhoanController@editAccountAdmin')->name('admin.accounts.edit');
    Route::put('/accounts/{id}','TaiKhoanController@updateAccountAdmin')->name('admin.accounts.update');
    Route::get('/login', 'TaiKhoanController@getDangNhapAdmin')->name('admin.accounts.login');
    Route::post('/login', 'TaiKhoanController@postDangNhapAdmin');
    Route::get('/logout', 'TaiKhoanController@dangXuatAdmin')->name('admin.accounts.logout'); 
    Route::get('/sign-up','TaiKhoanController@getDangKyAdmin')->name('admin.accounts.sign-up');
    Route::post('/sign-up','TaiKhoanController@postDangKyAdmin');
    
     // Môn thể thao
    Route::match(['get','post'],'/monthethao',("MonTheThaoController@index"))->name('monthethao.index');
    Route::get('/monthethao/create',("MonTheThaoController@create"))->name('monthethao.create');
    Route::post('/monthethao/store',("MonTheThaoController@store"))->name('monthethao.store');
    Route::get('/monthethao/{id}/edit',("MonTheThaoController@edit"))->name('monthethao.edit');
    Route::put('/monthethao/{id}',("MonTheThaoController@update"))->name('monthethao.update');
    Route::delete('/monthethao/delete/{id}',("MonTheThaoController@delete"))->name('monthethao.delete');
    // Route::get('/monthethao/search',("MonTheThaoController@search"))->name('monthethao.search');
    //  loai sản phẩm
    Route::match(['get','post'],'/loaisanpham',("LoaisanphamController@index"))->name('loaisanpham.index');
    Route::get('/loaisanpham/create',("LoaisanphamController@create"))->name('loaisanpham.create');
    Route::post('/loaisanpham/store',("LoaisanphamController@store"))->name('loaisanpham.store');
    Route::get('/loaisanpham/{id}/edit',("LoaisanphamController@edit"))->name('loaisanpham.edit');
    Route::put('/loaisanpham/{id}',("LoaisanphamController@update"))->name('loaisanpham.update');
    Route::delete('/loaisanpham/delete/{id}',("LoaisanphamController@delete"))->name('loaisanpham.delete');
    // Route::get('/loaisanpham/search',("LoaisanphamController@search"))->name('loaisanpham.search');
    // nhà sản xuất
    Route::match(['get','post'],'/nhasanxuat',("NhaSanXuatController@index"))->name('nhasanxuat.index');
    Route::get('/nhasanxuat/create',("NhaSanXuatController@create"))->name('nhasanxuat.create');
    Route::post('/nhasanxuat/store',("NhaSanXuatController@store"))->name('nhasanxuat.store');
    Route::get('/nhasanxuat/{id}/edit',("NhaSanXuatController@edit"))->name('nhasanxuat.edit');
    Route::put('/nhasanxuat/{id}',("NhaSanXuatController@update"))->name('nhasanxuat.update');
    Route::delete('/nhasanxuat/delete/{id}',("NhaSanXuatController@delete"))->name('nhasanxuat.delete');
    // sản phẩm
    Route::match(['get','post'],'/sanpham',("SanPhamController@indexAdmin"))->name('sanpham.indexAdmin');
    Route::get('/sanpham/create',("SanPhamController@create"))->name('sanpham.create');
    Route::post('/sanpham/store',("SanPhamController@storeAdmin"))->name('sanpham.storeAdmin');
    // Route::get('/nhasanxuat/{id}/edit',("NhaSanXuatController@edit"))->name('nhasanxuat.edit');
    // Route::put('/nhasanxuat/{id}',("NhaSanXuatController@update"))->name('nhasanxuat.update');
    // Route::delete('/nhasanxuat/delete/{id}',("NhaSanXuatController@delete"))->name('nhasanxuat.delete');
    // slide show
    Route::match(['get','post'],'/slideshow',("SlideShowController@index"))->name('slideshow.index');
    Route::get('/slideshow/create',("SlideShowController@create"))->name('slideshow.create');
    Route::post('/slideshow/store',("SlideShowController@store"))->name('slideshow.store');
    Route::get('/slideshow/{id}/edit',("SlideShowController@edit"))->name('slideshow.edit');
    Route::put('/slideshow/{id}',("SlideShowController@update"))->name('slideshow.update');
    Route::delete('/slideshow/delete/{id}',("SlideShowController@delete"))->name('slideshow.delete');

    // hóa đơn
    Route::get('/bill','HoaDonController@index')->name('admin.bill.index');
    Route::get('/bill/bill-detail/{id}','HoaDonController@billDetail')->name('admin.bill.bill-detail');
    Route::get('bill/delete/{id}','HoaDonController@delete')->name('admin.bill.delete');
    Route::get('bill/print/{id}','HoaDonController@printBill')->name('admin.bill.print');
    
});

Route::get('/insert', function() {
    DB::table('tai_khoans')->insert(['ho_ten'=>'Lê Đức Phú', 'password' => bcrypt('3456789'), 'email' => 'ldp@gmail.com', 'so_dien_thoai' => '0366753798', 'admin' => false]);
});
Route::get('/sign-up','TaiKhoanController@getDangKy')->name('accounts.sign-up');
Route::post('/sign-up','TaiKhoanController@postDangKy');
Route::get('/login', 'TaiKhoanController@getDangNhap')->name('accounts.login');
Route::post('/login', 'TaiKhoanController@postDangNhap');
Route::get('/logout', 'TaiKhoanController@dangXuat')->name('accounts.logout');
Route::get('/', 'PageController@index')->name('index');
Route::get('/products', 'PageController@tatcasanpham')->name('product.products');
Route::get('/product-details/{id}','PageController@chitietsanpham')->name('product_detail');
Route::get('/product-details/get-size/{id}/{mau}','PageController@getSize');
Route::get('/product-details/get-qty/{id}/{mau}/{kichthuoc}','PageController@getQty');
Route::get('/carts', function () {
    return view('pages.cart');
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
Route::get('/list-like', function () {
    return view('pages.listlike');
});
Route::get('/accounts/{id}', 'TaiKhoanController@quanLyTaiKhoan')->name('accounts');
Route::put('/accounts/change-password/{id}','TaiKhoanController@putDoiMatKhau')->name('account.changePassword');
Route::put('/accounts/{id}','TaiKhoanController@updateAccount')->name('accounts.update');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart', 'GioHangController@index')->name('cart.index');
Route::post('/cart/save', 'GioHangController@save')->name('cart.save');
Route::get('/cart/delete-item-ajax/{id}', 'GioHangController@deleteItemAjax')->name('cart.deleteItemAjax');
Route::get('/cart/update-item/{id}/{qty}', 'GioHangController@updateItem')->name('cart.updateItem');
Route::get('/checkout', 'ThanhToanController@index')->name('checkout.index');
Route::post('/checkout/create','HoaDoncontroller@create')->name('bill.create');

//yeu thich
Route::get('/like/{sp_id}/{tk_id}','PageController@like');
Route::get('/dislike/{sp_id}/{tk_id}','PageController@dislike');
Route::get('/like-product-detail/{sp_id}/{tk_id}','PageController@likeProductDetail');
Route::get('/dislike-product-detail/{sp_id}/{tk_id}','PageController@dislikeProductDetail');
Route::get('/like-product-detail-splq/{sp_id}/{tk_id}','PageController@likeProductDetailSPLQ');
Route::get('/dislike-product-detail-splq/{sp_id}/{tk_id}','PageController@dislikeProductDetailSPLQ');