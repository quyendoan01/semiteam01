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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/product', [UserController::class, 'product'])->name('product');
Route::get('/staff', [UserController::class, 'staff'])->name('staff');
Route::get('/add_account', [UserController::class, 'add_account'])->name('add_account');
Route::get('/add_product', [UserController::class, 'add_product'])->name('add_product');





//Route::get('/logout', [UserController::class, 'logout'])->name('logout');
