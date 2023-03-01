<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


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
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/product', [UserController::class, 'product'])->name('product');
Route::get('/staff', [UserController::class, 'staff'])->name('staff');
Route::get('/add_account', [UserController::class, 'add_account'])->name('add_account');
//<<<<<<< HEAD
Route::get('/user_inf', [UserController::class, 'user_inf'])->name('user_inf');
Route::get('/bill', [UserController::class, 'bill'])->name('bill');
Route::get('/add_bill', [UserController::class, 'add_bill'])->name('add_bill');
//=======

Route::get('/add_product', [UserController::class, 'add_product'])->name('add_product');
Route::get('/user_edit/{id}',[UserController::class,'user_edit'])->name('user_edit');
Route::get('/user_delete/{id}',[UserController::class,'user_delete'])->name('user_delete');

Route::post('/', [UserController::class, 'logout'])->name('logout');
Route::post('/add_acc_auth', [UserController::class, 'add_acc_auth'])->name('add_acc_auth');
Route::post('/user_edit_auth',[UserController::class,'user_edit_auth'])->name('user_edit_auth');
Route::post('/login_auth',[UserController::class,'login_auth'])->name('login_auth');
