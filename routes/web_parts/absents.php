<?php


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PresentController;
use App\Http\Controllers\AbsentController;
use App\Http\Controllers\LessonController;




Route::group(['middleware' => 'student'], function () {
    Route::post('/student/lessons/{lesson}', [PresentController::class, 'store'])->name('lessons.present.store');

    Route::get('/student/lessons/{lesson}', [LessonController::class, 'now'])->name('lessons.now.show');

    Route::get('/student/absents/{year?}/{month?}', [AbsentController::class, 'table'])->name('absents.index');
});