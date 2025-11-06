<?php

use App\Http\Controllers\CalculatorController;
use Brick\Math\Internal\Calculator;
use Illuminate\Support\Facades\Route;

Route::get('/',  [\App\Http\Controllers\LoginController::class, 'index']);
Route::get('login',  [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');
Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);
    Route::get('user', [\App\Http\Controllers\userController::class, 'index'])->name('user.index');
    Route::get('user/create', [\App\Http\Controllers\userController::class, 'create'])->name('user.create');
    Route::post('user/store', [\App\Http\Controllers\userController::class, 'store'])->name('user.store');
    Route::get('user/edit/{id}', [\App\Http\Controllers\userController::class, 'edit'])->name('user.edit');
    Route::put('user/update/{id}', [\App\Http\Controllers\userController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    Route::resource('category', \App\Http\Controllers\CategoriesController::class);
    Route::resource('role', \App\Http\Controllers\RoleController::class);
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    Route::resource('profile', \App\Http\Controllers\ProfileController::class);
    Route::resource('order', \App\Http\Controllers\OrderController::class);
    Route::post('change-password', [\App\Http\Controllers\ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::post('change-profile', [\App\Http\Controllers\ProfileController::class, 'changeProfile'])->name('profile.change-profile');
    Route::get('order/get-products', [\App\Http\Controllers\ProductController::class, 'getProducts'])->name('order.get-products');
});

// untuk resource tidak perlu menyebutkan method
Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);
Route::get('belajar/tambah', [\App\Http\Controllers\BelajarController::class, 'tambah'])->name('belajar.tambah');
Route::post('storeTambah', [\App\Http\Controllers\BelajarController::class, 'storeTambah'])->name('storeTambah');

Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);
Route::get('belajar/kurang', [\App\Http\Controllers\BelajarController::class, 'kurang'])->name('belajar.kurang');
Route::post('storeKurang', [\App\Http\Controllers\BelajarController::class, 'storeKurang'])->name('storeKurang');

Route::get('calculator', [\App\Http\Controllers\CalculatorController::class, 'create']);
Route::post('calculator/create', [\App\Http\Controllers\CalculatorController::class, 'store'])->name('calculator.store');
// get: preview / menampilkan
// post : mengirimkan sebuah data melalui form
// put : mengirim sebuah data melalui form tapi update
//delete : mengirim sebuah data melalui form tapi hapus