<?php

use Illuminate\Support\Facades\Route;
use Modules\Teacher\Http\Controllers\Auth\AuthController;
use Modules\Teacher\Http\Controllers\Exam\ExamController;
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
Route::controller(ExamController::class)->prefix('teacher/panel/exams')->middleware('auth:teacher')->group(function() {
    Route::get('/', 'index')->name('teacher.show.exams');
    Route::get('create-new-exam', 'create')->name('teacher.show.create.new.exam.form');
    Route::post('create-draft-exam', 'createDraftExam')->name('teacher.create.draft.exam');
    Route::get('fill-exam-questions/{exam}', 'fillExamQuestions')->name('teacher.fill.exam.questions');
    Route::post('save-exam-questions/{exam}', 'saveExamQuestions')->name('teacher.save.exam.questions');
    Route::get('delete-exam/{exam}', 'deleteExam')->name('teacher.delete.exam');
    Route::get('edit-exam/{exam}', 'showEditForm')->name('teacher.show.edit.exam.form');
    Route::post('update-exam/{exam}', 'updateExam')->name('teacher.update.exam');
    Route::get('preview-exam/{exam}', 'previewExam')->name('teacher.previewExam.exam');
});
