<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product routes
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/san-pham/{slug}', [ProductController::class, 'sho\w'])->name('products.show');
Route::get('/danh-muc/{slug}', [ProductController::class, 'category'])->name('products.category');

// Voyager Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Contact routes
Route::get('/lien-he', [ContactController::class, 'index'])->name('contact');

// About route
Route::get('/gioi-thieu', [AboutController::class, 'index'])->name('about');

