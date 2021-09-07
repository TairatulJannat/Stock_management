<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;





// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::get('/', [HomeController::class, 'index'])->name('home'); //Homepage Route
Route::get('locale/{locale}', 'MuliLanguageController@switchLocale')->name('locale.set');


Route::middleware('auth')->group(function(){


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');



Route::get('/profile', [HomeController::class, 'show'])->name('user.show');

Route::put('/profile', [HomeController::class, 'update'])->name('user.update');



Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('stock', StockController::class);
Route::get('cat_product', 'StockController@cat_product');
Route::get('previous_product', 'StockController@previous_product');


});