<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
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
    return view('index');
});

Route::controller(SchoolController::class)->group(function(){
    Route::get('/schools','index')->name('schools.index');
    Route::get('/schools/create','create')->name('schools.create');
    Route::post('/schools','store')->name('schools.store');
    // Route::post('/schools/addmorePost','addmorePost')->name('addmorePost');

});
// Route::controller(StudentController::class)->group(function(){
//     Route::post('/students','store')->name('students.store');
// });

// // Schools Routes
// Route::resource('schools', SchoolController::class);

// // Students Routes
// Route::resource('students', StudentController::class);