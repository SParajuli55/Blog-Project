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

use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'home'])->name('home');

Route::prefix('auth')->name('auth.')->group(function() {
    Route::get('/admin-login', [AuthController::class, 'loginindex'])->name('admin-login');
    Route::get('/register', [AuthController::class, 'index'])->name('register');
    Route::post('/store', [AuthController::class, 'store'])->name('store');
    Route::post('/login-store', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');


});



Route::prefix('authuser')->name('authuser.')->group(function() {
    Route::get('/login', [UserController::class, 'loginindex'])->name('index');
    Route::get('/register', [UserController::class, 'index'])->name('register');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::post('/login-store', [UserController::class, 'login'])->name('login');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

});
