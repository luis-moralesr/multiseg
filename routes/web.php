<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\VideoController;
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



Auth::routes();

Route::middleware(['admin'])->group(function () {
    Route::resource('admin/dashboard',AdminController::class);
    Route::resource('admin/courses',CourseController::class);
});

Route::resource('video',VideoController::class);
Route::resource('/welcome',WelcomeController::class);
