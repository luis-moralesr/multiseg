<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\VerificationsController;
use App\Http\Controllers\Auth\RegisterController;

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


Route::get('/about', function () {
    return view('about');
});



Auth::routes(['verify' => true]);

Route::middleware(['admin'])->group(function () {
    Route::resource('admin/dashboard',AdminController::class);
    Route::resource('admin/courses',CourseController::class);
});

Route::resource('video',VideoController::class);

Route::resource('/welcome',WelcomeController::class);
Route::resource('/comments',CommentsController::class);

Route::post('/enrollment/{id}', [EnrollmentController::class, 'store'])->name('enrollment.store');
Route::post('/enrollmentsProgress', [EnrollmentController::class, 'progress'])->name('enrollment.progress');
Route::get('/getProgress/{id}', [EnrollmentController::class, 'getProgress'])->name('enrollment.getProgress');
Route::put('/markCompleted/{courseId}/{id}', [EnrollmentController::class, 'completed'])->name('enrollment.complete');
Route::post('/certification', [EnrollmentController::class, 'crateCertificaton'])->name('certifications.store');
Route::get('/certification/{id}/data', [EnrollmentController::class, 'getCertificationData'])->name('certification.data');





