<?php

use Illuminate\Support\Facades\Route;
use Modules\Teacher\Http\Controllers\Auth\AuthController;
use Modules\Teacher\Http\Controllers\Teacher\TeacherController;

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
Route::controller(AuthController::class)->prefix('teacher')->group(function() {
    Route::get('sign-in', 'showSignInForm')->name('show.teacher.login.form');
    Route::post('signing-in', 'signingIn')->name('teacher.signing-in');

    Route::get('sign-up', 'showSignUpForm')->name('show.teacher.signup.form');
    Route::post('signing-up', 'signingUp')->name('teacher.signing.up');
});

Route::controller(TeacherController::class)->prefix('teacher/panel')->middleware('auth:teacher')->group(function() {
    Route::get('/', 'index')->name('teacher.show.dashboard');
    Route::post('logout', 'Logout')->name('teacher.logout');
});
