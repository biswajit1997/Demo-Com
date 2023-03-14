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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/update', [App\Http\Controllers\HomeController::class, 'update']);
Route::post('/otp', [App\Http\Controllers\HomeController::class, 'otp']);
Route::post('/add_education', [App\Http\Controllers\EducationController::class, 'add_education']);
Route::get('/delete-edu/{id}', [App\Http\Controllers\EducationController::class, 'destroy']);
Route::get('/edit-edu/{id}', [App\Http\Controllers\EducationController::class, 'edit']);
Route::post('/update-edu/{id}', [App\Http\Controllers\EducationController::class, 'update']);