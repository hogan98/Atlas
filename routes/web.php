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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
		Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

		//Category routes
		Route::resource('/categories', App\Http\Controllers\Admin\CategoriesController::class)->except('show');
});
