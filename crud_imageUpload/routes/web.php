<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('products.index');
});

// Route::controller(ProductController::class)->group(function(){
//     Route::get('/products','index')->name('home');
//     Route::get('/products/create','create')->name('create');
//     Route::post('/products','store')->name('store');
//     Route::get('/products/{products}/edit','edit')->name('edit');
//     Route::put('/products/{product}','update')->name('update');
//     Route::get('/products/{products}','show')->name('show');
//     Route::delete('/products/{products}','destroy')->name('delete');
// });


Route::resource('products', ProductController::class);