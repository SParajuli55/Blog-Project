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

use Modules\Category\Http\Controllers\CategoryController;

Route::prefix('category')->name('category.')->group(function() {
    Route::get('/create-category', [CategoryController::class, 'create'])->name('create');
    Route::post('/create-category', [CategoryController::class, 'store'])->name('store');
    Route::get('/index-category', [CategoryController::class, 'index'])->name('index');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete');
    Route::get('/show-category/{id}', [CategoryController::class, 'show'])->name('show');
});
