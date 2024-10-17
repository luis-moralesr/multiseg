<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});



Auth::routes();


Route::middleware(['admin'])->group(function () {
    Route::resource('admin/dashboard',AdminController::class);
});


Route::get('video', function () {
    return view('video');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
