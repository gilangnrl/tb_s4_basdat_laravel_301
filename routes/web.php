<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Auth::routes();


Route::group(['middleware' => ['admin']], function () {
    Route::group(['prefix' => 'admin-view'], function () {
        Route::get('/', [\App\Http\Controllers\HomeController::class, 'adminView'])->name('admin_view');
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', [\App\Http\Controllers\ProductControler::class, 'index'])->name('admin.product');
            Route::get('/create', [\App\Http\Controllers\ProductControler::class, 'create'])->name('admin.product.create');
            Route::post('/store', [\App\Http\Controllers\ProductControler::class, 'store'])->name('admin.product.store');
            Route::get('/edit/{id}', [\App\Http\Controllers\ProductControler::class, 'edit'])->name('admin.product.edit');
            Route::put('/update/{id}', [\App\Http\Controllers\ProductControler::class, 'update'])->name('admin.product.update');
            Route::delete('/desctroy/{id}', [\App\Http\Controllers\ProductControler::class, 'destroy'])->name('admin.product.destroy');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');
            Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::put('/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('/destroy/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.category.destroy');
        });

        Route::group(['prefix' => 'report'], function () {
            Route::get('/', [\App\Http\Controllers\ReportController::class, 'index'])->name('admin.report');
        });
    });
});
