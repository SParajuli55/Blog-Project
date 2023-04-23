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

use Modules\Blog\Http\Controllers\BlogController;
use Modules\Blog\Http\Controllers\UserBlogController;

Route::prefix('blog')->name('blogs.')->group(function() {
    Route::get('/create-blogs', [BlogController::class, 'create'])->name('create');
    Route::post('/store-blogs', [BlogController::class, 'store'])->name('store');
    Route::get('/view-blogs', [BlogController::class, 'view'])->name('view');
    Route::get('/show-blogs/{id}', [BlogController::class, 'show'])->name('show');
    Route::get('/edit-blogs/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::post('/update-blogs/{id}', [BlogController::class, 'update'])->name('update');
    Route::get('/delete-blogs/{id}', [BlogController::class, 'destroy'])->name('delete');

});

Route::prefix('userblog')->name('userblogs.')->group(function() {
    Route::get('/create-blogs', [UserBlogController::class, 'create'])->name('create');
    Route::post('/store-blogs', [UserBlogController::class, 'store'])->name('store');

    Route::get('/edit-blogs/{id}', [UserBlogController::class, 'edit'])->name('edit');
    Route::post('/update-blogs/{id}', [UserBlogController::class, 'update'])->name('update');

    Route::get('/show-blogs/{id}', [UserBlogController::class, 'show'])->name('show');
    Route::get('/view-blogs', [UserBlogController::class, 'view'])->name('view');




});


