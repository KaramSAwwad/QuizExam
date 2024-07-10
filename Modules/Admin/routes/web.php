<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\SignInController;
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

Route::controller(SignInController::class)->prefix('panel/admin')->group(function() {
    //this route for redirect if not authenticate
//    Route::get('sign-in', 'showSignInForm')->name('admin.show.login.form');
    Route::get('sign-in', 'showSignInForm')->name('login');
    Route::post('signing-in', 'signingIn')->name('admin.signing-in');
});
Route::controller(AdminController::class)->prefix('panel/admin')->middleware('auth:admin')->group(function() {
    Route::get('/', 'index')->name('admin.show.dashboard');
    Route::post('logout', 'Logout')->name('admin.logout');

    Route::get('update-profile-admin/{id}', 'AdminController@showUpdateProfileForm')->name('admin.show.update.profile.form');
    Route::post('update-profile/{id}', 'AdminController@updateProfileAdmin')->name('admin.update.profile');

});
