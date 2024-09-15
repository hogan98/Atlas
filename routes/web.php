<?php

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

// Route::view('/', 'home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
		Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

		//Category routes
		Route::resource('/categories', App\Http\Controllers\Admin\CategoriesController::class)->except('show');
		
		//User routes
		Route::resource('/users', App\Http\Controllers\Admin\UsersController::class)->except(['show', 'create','store']);
		
		//Product routes
		Route::resource('/products', App\Http\Controllers\Admin\ProductsController::class)->except('show');

		//Orders routes
		Route::resource('/orders', App\Http\Controllers\Admin\OrdersController::class);

		//Status routes
		Route::resource('/status', App\Http\Controllers\Admin\StatusController::class)->except('show');
});
