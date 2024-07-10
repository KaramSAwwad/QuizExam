<?php

use Illuminate\Support\Facades\Route;
use Modules\Student\Http\Controllers\Auth\AuthController;
use Modules\Student\Http\Controllers\Student\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(AuthController::class)->prefix('student')->group(function() {
    Route::get('sign-in', 'showSignInForm')->name('show.student.login.form');
    Route::post('signing-in', 'signingIn')->name('student.signing-in');

    Route::get('sign-up', 'showSignUpForm')->name('show.student.signup.form');
    Route::post('signing-up', 'signingUp')->name('student.signing.up');
});

Route::controller(StudentController::class)->prefix('student/panel')->middleware('auth:student')->group(function() {
    Route::get('/', 'index')->name('student.show.dashboard');
    Route::post('logout', 'Logout')->name('student.logout');
});
