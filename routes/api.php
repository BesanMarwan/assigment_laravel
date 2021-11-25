<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
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
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['prefix'=>"auth"],function(){
    Route::post('/login',    [AuthController::class,'login']);
    Route::group(['middleware'=>'auth:sanctum'],function(){
        Route::get('/logout',[AuthController::class,'logout']);
    });
});
Route::group(['prefix'=>"products"],function() {
    Route::get('/',                  [ProductController::class,'index']);
    Route::get('show-product/{id}',  [ProductController::class,'showProduct']);
    Route::get('products-category/{id}',  [ProductController::class,'showProductsCategory']);
    Route::get('products-priceDesc/',  [ProductController::class,'sortPriceDesc']);
    Route::get('products-priceAsc/',  [ProductController::class,'sortPriceAsc']);
});

############################ api show all categories ###############################
Route::group(['prefix'=>"categories"],function() {
    Route::get('/', [CategoryController::class,'index']);
});

