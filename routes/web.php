<?php

use App\Http\Controllers\HoaDonBanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\sanphamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//
// Route::controller(App\Http\Controllers\login::class)->group(function(){
//     Route::get('/admin/login','login')->name('login');
// });
//

//login
Route::controller(App\Http\Controllers\HomeController::class)->group(function(){
    Route::post('/addbill/{id}','addbill')->name('addbill');
    Route::get('/register','register')->name('register');
    Route::get('/login','login')->name('loginuser');
    Route::get('/login/logout','logout')->name('logoutuser');
    Route::post('/login/check','checklogin')->name('checklogin');

});

route::get('/', [App\Http\Controllers\HomeController:: class,'index'] )->name('Home.index') ;
route::get('/index', [App\Http\Controllers\HomeController:: class,'index'] )->name('Home.index') ;
route::get('/blog', [App\Http\Controllers\HomeController:: class,'blog'] )->name('Home.blog') ;
route::get('/detail/{id}', [App\Http\Controllers\HomeController:: class,'detail'] )->name('Home.detail') ;
//
Route::get('/shop/{id}',[App\Http\Controllers\HomeController::class,'shop']);

// Route::get('/nguoidung/chi-tiet-sanpham/{product_id}',[ProductController::class,'details_product']);



Route::get('/contact', function () {
    return view('contact');
});


//admin
Route::get('/admin', function () {
    return view('admin.app');
});

//loại sản phẩm
Route::get('/admin/loaisp', [AdminController::class,'loaisp_index'])->name("admin.loaisp.index");
Route::get('/admin/{id?}/xoaloai', [AdminController::class,'loaisp_delete'])->name("admin.loaisp.delete");
Route::get('/admin/{id?}/showloai', [AdminController::class,'loaisp_show'])->name("admin.loaisp.show");
Route::post('/admin/{id?}/updateloai', [AdminController::class,'loaisp_update'])->name("admin.loaisp.update");
Route::get('/admin/new', [AdminController::class,'loaisp_new'])->name("admin.loaisp.new");
Route::post('/admin/store', [AdminController::class,'loaisp_store'])->name("admin.loaisp.addnew");


//tin tức
Route::get('/admin/tintuc', [AdminController::class,'tintuc_index'])->name("admin.tintuc.index");
Route::get('/admin/{id?}/showtt', [AdminController::class,'tintuc_show'])->name("admin.tintuc.show");
Route::post('/admin/{id?}/updatett', [AdminController::class,'tintuc_update'])->name("admin.tintuc.update");
Route::get('/admin/{id?}/xoatt', [AdminController::class,'tintuc_delete'])->name("admin.tintuc.delete");
Route::get('/admin/newtt', [AdminController::class,'tintuc_new'])->name("admin.tintuc.new");
Route::post('/admin/storett', [AdminController::class,'tintuc_store'])->name("admin.tintuc.addnew");

//sản phẩm
Route::get('/admin/sanpham', [AdminController::class,'sanpham_index'])->name("admin.sanpham.index");
Route::get('/admin/{id?}/showsp', [AdminController::class,'sanpham_show'])->name("admin.sanpham.show");
Route::post('/admin/{id?}/updatesp', [AdminController::class,'sanpham_update'])->name("admin.sanpham.update");
Route::get('/admin/{id?}/xoasp', [AdminController::class,'sanpham_delete'])->name("admin.sanpham.delete");
Route::get('/admin/newsp', [AdminController::class,'sanpham_new'])->name("admin.sanpham.new");
Route::post('/admin/storesp', [AdminController::class,'sanpham_store'])->name("admin.sanpham.addnew");

//người dùng

Route::get('/admin/nguoidung', [AdminController::class,'nguoidung_index'])->name("admin.nguoidung.index");
Route::get('/admin/{id?}/shownd', [AdminController::class,'nguoidung_show'])->name("admin.nguoidung.show");
Route::post('/admin/{id?}/updatend', [AdminController::class,'nguoidung_update'])->name("admin.nguoidung.update");
Route::get('/admin/{id?}/xoand', [AdminController::class,'nguoidung_delete'])->name("admin.nguoidung.delete");
Route::get('/admin/newnd', [AdminController::class,'nguoidung_new'])->name("admin.nguoidung.new");
Route::post('/admin/storend', [AdminController::class,'nguoidung_store'])->name("admin.nguoidung.addnew");
//

//Khách hàng
Route::get('/admin/khachhang', [AdminController::class,'khachhang_index'])->name("admin.khachhang.index");
Route::get('/admin/{id?}/showkh', [AdminController::class,'khachhang_show'])->name("admin.khachhang.show");
Route::post('/admin/{id?}/updatekh', [AdminController::class,'khachhang_update'])->name("admin.khachhang.update");
Route::get('/admin/{id?}/xoakh', [AdminController::class,'khachhang_delete'])->name("admin.khachhang.delete");
Route::get('/admin/newkh', [AdminController::class,'khachhang_new'])->name("admin.khachhang.new");
Route::post('/admin/storekh', [AdminController::class,'khachhang_store'])->name("admin.khachhang.addnew");
//
// giỏ hàng
//Route::get('/', [sanphamController::class, 'productList'])->name('sanphams.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('thanhtoan', [CartController::class, 'thanhtoan'])->name('cart.thanhtoan');
Route::post('thanhtoan', [CartController::class, 'thanhtoan1'])->name('cart.thanhtoan1');
Route::get('donhang', [CartController::class, 'qldonhang'])->name('cart.qldonhang');
Route::get('donhangchitiet/{id}', [CartController::class, 'qldonhangchitiet'])->name('cart.qldonhangchitiet');
Route::get('duyet', [CartController::class, 'qlddonhang'])->name('cart.qlddonhang');
//hóa đơn bán


Route::controller(App\Http\Controllers\AdminController::class)->group(function(){
    Route::get('/admin/hoadonban','hoadonban_index')->name('hoadonban.index');
    Route::get('/admin/hoadonban/detail/{id}','hoadonban_detail')->name('hoadonban.detail');
    Route::post('/admin/hoadonban/addbill/{id}','addbill')->name('hoadonban.addbill');
    Route::get('/admin/hoadonban/delete/{id}', 'delete')->name('hoadonban.delete');
});

Route::controller(App\Http\Controllers\HoaDonBanController::class)->group(function () {
    Route::get('/admin/hoadonban/xacnhan/{id}', 'xacnhan')->name('hoadonban.xacnhan');
    Route::get('/admin/hoadonban/xacnhandagiao/{id}', 'xacnhandagiao')->name('hoadonban.xacnhandagiao');
    Route::get('/admin/hoadonban/donhangcho', 'donhangcho')->name('donhangcho');
    Route::get('/admin/hoadonban/donhangdaban', 'donhangdaban')->name('donhangdaban');
});

// Route::get('/admin/hoadonban', [AdminController::class,'hoadonban_index'])->name("admin.hoadonban.index");
// Route::controller(App\Http\Controllers\NguoiDungController::class)->group(function () {

//     Route::get('/admin/nguoidung/viewlogin', 'viewlogin')->name('nguoidung.viewlogin');
//     Route::get('/admin/nguoidung/login', 'login')->name('nguoidung.login');
//     Route::get('/admin/nguoidung/logout', 'logout')->name('nguoidung.logout')->middleware(['auth']);

// });


//search
Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('Home.search');
