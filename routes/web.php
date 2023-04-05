<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CustomerController;



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

Route::get('', function () {
    return view('auth.login');
});

//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/user_inf', [UserController::class, 'user_inf'])->name('user_inf');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login_auth',[UserController::class,'login_auth'])->name('login_auth');
Route::get('/lc', [CustomerController::class, 'lc'])->name('customer.lc');
Route::get('/addlc', [CustomerController::class, 'addlc'])->name('addlc');
Route::post('/cus/add/auth', [CustomerController::class, 'add_cus_auth'])->name('add_cus_auth');
Route::post('/cus/edit/auth',[CustomerController::class,'cus_edit_auth'])->name('cus_edit_auth');
Route::get('/auth/edit/{id}',[CustomerController::class,'cus_edit'])->name('cus_edit');
Route::get('/auth/delete/{id}',[CustomerController::class,'cus_delete'])->name('cus_delete');
Route::get('/userinfo', [UserController::class, 'userinfo'])->name('userinfo');
Route::get('/user_information', [UserController::class, 'user_information'])->name('user_information');
Route::get('/auth/userinfo', [UserController::class, 'userinfo'])->name('userinfor');
Route::post('/userinfor_edit', [UserController::class, 'user_edit_info'])->name('infor.edit');
Route::get('/cus/search', [CustomerController::class,'search_cus'])->name('cus.search');



Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/product/add', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/search', [ProductController::class,'search'])->name('product.search');
Route::get('/product/sort-by-price/{order?}', [ProductController::class, 'sortByPrice'])->name('product.sortByPrice');
Route::get('/product/filter/{cat?}', [ProductController::class,'filter'])->name('product.filter');
Route::post('/user/edit', [CategoryController::class, 'edit'])->name('user.edit');


Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/add', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');


Route::get('/account', [UserController::class, 'account'])->name('account')->middleware('auth');
Route::get('/account/add', [UserController::class, 'add_account'])->name('add_account');
Route::get('/account/edit/{id}',[UserController::class,'user_edit'])->name('user_edit')->middleware('auth');
Route::get('/account/delete/{id}',[UserController::class,'user_delete'])->name('user_delete')->middleware('auth');
Route::post('/account/add/auth', [UserController::class, 'add_acc_auth'])->name('add_acc_auth');
Route::post('/account/edit/auth',[UserController::class,'user_edit_auth'])->name('user_edit_auth')->middleware('auth');
Route::get('/account/search', [UserController::class,'search'])->name('account.search');



Route::get('/bill', [BillController::class, 'bill'])->name('bill')->middleware('auth');
Route::get('/bill/add', [BillController::class, 'add_bill'])->name('add_bill');
Route::post('/bill/store', [BillController::class, 'store_bill'])->name('store_bill');
Route::get('/bill/show/{id}', [BillController::class, 'show_bill'])->name('show_bill');
Route::get('/bill/sort/{id}', [BillController::class, 'sort_bill'])->name('sort_bill');
Route::get('/bill/search', [BillController::class, 'search_bill'])->name('search_bill');


Route::get('/search', 'UserController@search');
