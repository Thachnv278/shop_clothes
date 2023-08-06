<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\clients\BillController;
use App\Http\Controllers\clients\CartController;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\SaleController;
use App\Http\Controllers\SaleController as ControllersSaleController;
use App\Http\Controllers\BIllController as ControllersBIllController;
use App\Http\Controllers\BillDetailController;

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





Route::get('product', function () {
    return view('clients.product');
});
Route::get('about', function () {
    return view('clients.about');
});
Route::get('blog', function () {
    return view('clients.blog');
});
Route::get('contact', function () {
    return view('clients.contact');
});

Route::get('signin', function () {
    return view('account.signin');
});
Route::get('signup', function () {
    return view('account.signup');
});
Route::get('user', function () {
    return view('admin.user');
});
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('detail/{id}',[HomeController::class,'detail'])->name('detail');
Route::get('Product',[App\Http\Controllers\clients\ProductController::class,'index'])->name('Product');






//Tài khoản
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    // Các route yêu cầu quyền quản trị viên sẽ được định nghĩa ở đây
    // Danh Mục
    Route::get('/Category/list', [CategoryController::class, 'getCategory'])->name('listCategory');
    Route::match(['GET', 'POST'], '/Category/add', [CategoryController::class, 'add'])->name('addCategory');
    Route::match(['GET', 'POST'], '/Category/edit/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::get('/Category/delete/{id}', [CategoryController::class, 'delete'])->name('deleteCategory');
    // tài khoản
    Route::get('/User/list', [UserController::class, 'getUser'])->name('listUser');
    Route::match(['GET', 'POST'], '/User/addAdmin', [UserController::class, 'addAdmin'])->name('addAdmin');
    Route::match(['GET', 'POST'], '/User/edit/{id}', [UserController::class, 'edit'])->name('editUser');
    Route::get('/User/delete/{id}', [UserController::class, 'delete'])->name('deleteUser');
    //thương hiệu
    Route::get('/Brand/list', [BrandController::class, 'getBrand'])->name('listBrand');
    Route::match(['GET', 'POST'], '/Brand/add', [BrandController::class, 'add'])->name('addBrand');
    Route::match(['GET', 'POST'], '/Brand/edit/{id}', [BrandController::class, 'edit'])->name('editBrand');
    Route::get('/Brand/delete/{id}', [BrandController::class, 'delete'])->name('deleteBrand');
    //sản phẩm
    Route::get('/Product/list', [ProductController::class, 'getProduct'])->name('listProduct');
    Route::match(['GET', 'POST'], '/Product/add', [ProductController::class, 'add'])->name('addProduct');
    Route::match(['GET', 'POST'], '/Product/edit/{id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::get('/Product/delete/{id}',[ProductController::class,'delete'])->name('deleteProduct');
    //chi tiết sản phẩm
    Route::get('Detail/list/{id}',[DetailController::class,'getDetail'])->name('listDetail');
    Route::match(['GET','POST'],'Detail/add/{id}',[DetailController::class,'add'])->name('addDetail');
    Route::match(['GET','POST'],'Detail/edit/{id}',[DetailController::class,'edit'])->name('editDetail');
    Route::get('/Detail/delete/{id}',[DetailController::class,'delete'])->name('deleteDetail');
    // banner
    Route::get('Banner/list',[BannerController::class,'getBanner'])->name('listBanner');
    Route::match(['GET','POST'],'Banner/add',[BannerController::class,'add'])->name('addBanner');
    Route::match(['GET','POST'],'Banner/edit/{id}',[BannerController::class,'edit'])->name('editBanner');
    Route::get('Banner/delete/{id}',[BannerController::class,'delete'])->name('deleteBanner');
    //khuyến mại
   Route::get('Sale/list',[ControllersSaleController::class,'index'])->name('listSale');
   Route::match(['GET','POST'],'Sale/add',[ControllersSaleController::class,'add'])->name('addSale');
   Route::match(['GET','POST'],'Sale/edit/{id}',[ControllersSaleController::class,'edit'])->name('editSale');
   Route::get('Sale/delete/{id}',[ControllersSaleController::class,'delete'])->name('deleteSale');
   //Đơn hàng
   Route::get('Bill/list',[ControllersBIllController::class,'index'])->name('listBill');
   Route::match(['GET','POST'],'Bill/edit/{id}',[ControllersBIllController::class,'edit'])->name('editBill');
   Route::get('BillDetail/list/{id}',[BillDetailController::class,'index'])->name('listBillDetail');


   
});





//tài khoản
Route::get('/showsignin', [AccountController::class, 'showsignin'])->name('showsignin');
Route::POST('/signin', [AccountController::class, 'signin'])->name('signin');//đăng Nhập
Route::get('/signout', [AccountController::class, 'signout'])->name('signout');// đăng xuất
Route::match(['GET', 'POST'], '/User/add', [UserController::class, 'add'])->name('addUser');// đăng kí người dùng
Route::get('/showcart',[CartController::class,'show'])->name('showcart');


// giỏ hàng

    
Route::POST('/addcart',[CartController::class,'add'])->name('addcart');
Route::POST('/updatecart', [CartController::class, 'update'])->name('updatecart');
Route::GET('/deletecart/{id}', [CartController::class, 'delete'])->name('deletecart');


//bill
Route::get('/checkout',[BillController::class,'index'])->name('checkout');
Route::post('/billadd',[BillController::class,'add'])->name('billadd');
Route::get('/billdetail/{id}',[BillController::class,'billdetail'])->name('billdetail');
Route::get('/showbill',[BillController::class,'showbill'])->name('showbill');
Route::post('/saleadd',[SaleController::class,'saleadd'])->name('saleadd');

