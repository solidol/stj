<?php


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PresentController;
use App\Http\Controllers\AbsentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentPracticeController;



Route::group(['middleware' => 'student'], function () {
    Route::get('/journals/{id}/show/marks', [JournalController::class, 'studentMarks'])->name('student_get_marks');

    Route::get('/journals', [JournalController::class, 'studentMarks'])->name('student.journals.index');

    Route::post('/lessons/{lesson}', [PresentController::class, 'store'])->name('lessons.present.store');

    Route::get('/lessons/{lesson}', [LessonController::class, 'now'])->name('lessons.now.show');

    Route::get('/absents/{year?}/{month?}', [AbsentController::class, 'studentTable'])->name('student.absents.index');

    Route::get('/teachers', [GroupController::class, 'studentTeachers'])->name('student.teachers.index');

    Route::get('/absents/{year?}/{month?}', [AbsentController::class, 'studentTable'])->name('student.absents.index');

    Route::get('/practices/{practice}', [StudentPracticeController::class, 'show'])->name('student.practices.show');
});