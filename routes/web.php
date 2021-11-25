<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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


Auth::routes(['register'=>false]);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {

    Route::group(['middleware' => 'auth', 'as' => 'admin.'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        ######################### Begin categories Route ########################
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/',         [CategoriesController::class, 'index'])->name('index');
            Route::post('/store',   [CategoriesController::class, 'store'])->name('store');
            Route::get('/show/{id}',[CategoriesController::class, 'show'])->name('show');
            Route::post('/update',  [CategoriesController::class, 'update'])->name('update');
            Route::post('/delete',  [CategoriesController::class, 'delete'])->name('delete');
        });
        ######################### End categories Route ########################

        ######################### Begin product Route ########################
        Route::group(['prefix' => 'products','as'=>'products.'], function () {
            Route::get('/',             [ProductsController::class, 'index'])->name('index');
            Route::post('/store',       [ProductsController::class, 'store'])->name('store');
            Route::get('/show/{id}',    [ProductsController::class, 'show'])->name('show');
            Route::post('update/',      [ProductsController::class, 'update'])->name('update');
            Route::post('/delete',      [ProductsController::class, 'delete'])->name('delete');
            Route::post('/activate',    [ProductsController::class, 'activate'])->name('activate');
            ######################### End product Route #######################
        });
    });
});
