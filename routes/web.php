<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/cruds', function () {
    return view('cruds.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// products front-end

Route::get('/',[ProductController::class ,'index'])->name('product.index');


// backend 
// category
Route::get('backend',[CategoryController::class,'index'])->name('backend.index');
Route::POST('backend/store',[CategoryController::class,"store"])->name('backend.store');
Route::get('backend/show/{id}',[CategoryController::class , 'show'])->name('backend.show');
Route::POSt('backend/update/{id}',[CategoryController::class , 'update'])->name('backend.update');
Route::Delete('backend/destroy/{id}',[CategoryController::class , 'destroy'])->name('backend.destroy');

// prouct

Route::get('backend/product',[ProductController::class , 'product'])->name('backend.product');

Route::POST('backend/product/store',[ProductController::class , 'store'])->name('backend.product.store');

Route::get('backend/product/show/{id}',[ProductController::class , 'show'])->name('backend.product.show');
Route::POST('backend/product/update/{id}',[ProductController::class , 'update'])->name('backend.product.update');
Route::Delete('backend/product/destroy/{id}',[ProductController::class , 'destroy'])->name('backend.product.destroy');

