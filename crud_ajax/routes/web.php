<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('index');
});
Route::controller(ProductController::class)->group(function(){
    Route::get('/products','index')->name('home');
    Route::post('/products','store')->name('store');
    Route::get('/products/{product}/edit','edit')->name('edit');
    Route::delete('/products/{product}','destroy')->name('delete');
});



// Route::resource('products-ajax-crud', ProductController::class);