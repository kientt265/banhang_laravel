<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
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

Route::get('/', function () {
    return view('home');
});


Route::group(['prefix'=>''], function() {
    Route::get('/login', [AccountController::class, 'login']);
    Route::post('/login', [AccountController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [AccountController::class, 'register']);
    Route::post('/register', [AccountController::class, 'registerPost'])->name('register.post');
    Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
    Route::group(['prefix'=>'account'], function() {
        Route::get('/dashboard', [AccountController::class, 'dashboard'])->name('dashboard');
        Route::group(['prefix'=>'product'], function() {
            Route::get('/', [ProductController::class, 'index'])->name('product.index');
            // Change from POST to DELETE to match the form method
            Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        });
        
        // Lỗi cú pháp: dấu phẩy thay vì dấu chấm
        Route::get('/category', [CategoryController::class, 'index']);
    });
});