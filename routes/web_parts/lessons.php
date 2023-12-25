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
    Route::post('/student/lessons/{lesson}', [PresentController::class, 'store'])->name('lessons.present.store');
    Route::get('/student/lessons/{lesson}', [LessonController::class, 'now'])->name('lessons.now.show');
});