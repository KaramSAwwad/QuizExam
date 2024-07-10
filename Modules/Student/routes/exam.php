<?php

use Illuminate\Support\Facades\Route;
use Modules\Student\Http\Controllers\Exam\ExamController;
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
Route::controller(ExamController::class)->prefix('student/panel/exams')->middleware('auth:student')->group(function() {
    Route::get('/', 'index')->name('student.show.exams');
    Route::get('apply-to-exam/{exam}', 'applyToOpenExam')->name('student.apply.to.active.exam');
    Route::get('student-start-exam/{exam}', 'startExam')->name('student.start.exam');
    Route::post('student-finish-exam/{exam}', 'finishExam')->name('student.finish.exam');
    Route::get('my-finished-exams', 'showMyFinishedExams')->name('student.show.my.finished.exams');
    Route::get('preview-finished-exam/{exam}', 'previewMyFinishedExam')->name('student.preview.finished.exam');


});
