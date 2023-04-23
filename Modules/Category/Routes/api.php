<?php

use Illuminate\Http\Request;
use Modules\Category\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/category', function (Request $request) {
    return $request->user();
});
Route::prefix('category')->group(function(){
    Route::get('/get', [CategoryController::class, 'allCategories']);
    Route::get('/get/{id}', [CategoryController::class, 'categoryDetail']);

});
