<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [IndexController::class, 'adminIndex'])->name("index");


Route::get('category/index', [CategoryController::class, 'index'])->name("category.index");
Route::get('category/create', [CategoryController::class, 'create'])->name("category.create");
Route::post('category/store', [CategoryController::class, 'store'])->name("category.store");
Route::get('category/show/{category}', [CategoryController::class, 'show'])->name("category.show");
Route::get('category/edit/{category}', [CategoryController::class, 'edit'])->name("category.edit");
Route::put('category/update/{category}', [CategoryController::class, 'update'])->name("category.update");
Route::delete('category/destroy/{category}', [CategoryController::class, 'destroy'])->name("category.destroy");


Route::get('product/index', [ProductController::class, 'index'])->name("product.index");
Route::get('product/create', [ProductController::class, 'create'])->name("product.create");
Route::post('product/store', [ProductController::class, 'store'])->name("product.store");
Route::get('product/show/{product}', [ProductController::class, 'show'])->name("product.show");
Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name("product.edit");
Route::put('product/update/{product}', [ProductController::class, 'update'])->name("product.update");
Route::delete('product/destroy/{product}', [ProductController::class, 'destroy'])->name("product.destroy");


Route::get('cart/index', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/remove', [CartController::class, 'remove'])->name('cart.remove');

