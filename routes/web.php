<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//-------------------------- Product ------------------------
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('product', [ProductController::class, 'index']);
    Route::post('store', [ProductController::class, 'store'])->name('store');
    Route::post('purchase', [ProductController::class, 'purchase'])->name('purchase');
});


//-------------------------- Product ------------------------
Route::prefix('category/')->middleware('auth')->name('category.')->group(function () {
    Route::post('category-store', [CategoryController::class, 'category_store'])->name('category_store');
});
