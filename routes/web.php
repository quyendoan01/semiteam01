<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;



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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/user_inf', [UserController::class, 'user_inf'])->name('user_inf');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login_auth',[UserController::class,'login_auth'])->name('login_auth');
Route::get('/lc', [UserController::class, 'lc'])->name('lc');
Route::get('/addlc', [UserController::class, 'addlc'])->name('addlc');
Route::post('/cus/add/auth', [UserController::class, 'add_cus_auth'])->name('add_cus_auth');
Route::post('/cus/edit/auth',[UserController::class,'cus_edit_auth'])->name('cus_edit_auth');



Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/product/add', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/search', [ProductController::class,'search'])->name('product.search');
Route::get('/product/sort-by-price/{order?}', [ProductController::class, 'sortByPrice'])->name('product.sortByPrice');




Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::get('/category/add', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');


Route::get('/account', [UserController::class, 'account'])->name('account');
Route::get('/account/add', [UserController::class, 'add_account'])->name('add_account');
Route::get('/account/edit/{id}',[UserController::class,'user_edit'])->name('user_edit');
Route::get('/account/delete/{id}',[UserController::class,'user_delete'])->name('user_delete');
Route::post('/account/add/auth', [UserController::class, 'add_acc_auth'])->name('add_acc_auth');
Route::post('/account/edit/auth',[UserController::class,'user_edit_auth'])->name('user_edit_auth');


Route::get('/bill', [UserController::class, 'bill'])->name('bill');
Route::get('/bill/add', [UserController::class, 'add_bill'])->name('add_bill');

<<<<<<< HEAD
=======
Route::get('/search', 'UserController@search');
>>>>>>> 89020d334f59318125e3a0e2a78f365067b8b56b
