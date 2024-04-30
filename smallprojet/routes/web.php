

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\CategoryController;


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/Home',[HomeController::class, 'index'])->name('index');
    Route::get('/products',[ProductController::class, 'index'])->name('products');
    Route::get('/Create',[ProductController::class, 'create'])->name('create');
    Route::post('/store-product',[ProductController::class, 'store'])->name('store-product');
    Route::get('/edit-product/{id}',[ProductController::class ,'edit'])->name('edit-product');
    Route::put('/update-product/{id}',[ProductController::class, 'update'])->name('update-product');
    Route::delete('/delete/{id}',[ProductController::class, 'destroy'])->name('delete');
});




Route::get('/Category',[CategoryController::class,'index'])->name('index');
Route::get('/create_catego',[CategoryController::class,'create'])->name('categories.create');
Route::post('/store',[CategoryController::class,'store'])->name('store-category');
Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category-edit');
Route::put('/update/{id}',[CategoryController::class,'update'])->name('update-category');
Route::delete('/delete-category/{id}',[CategoryController::class,'destroy'])->name('delete-category');










