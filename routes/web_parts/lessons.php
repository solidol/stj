<?php


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PresentController;

use App\Http\Controllers\LessonController;




Route::group(['middleware' => 'student'], function () {
    Route::get('/lessons/journal:{journal}', [LessonController::class, 'index'])->name('lessons.index');
    Route::post('/lessons/{lesson}', [PresentController::class, 'store'])->name('lessons.present.store');
    Route::get('/student/lessons/{lesson}', [LessonController::class, 'now'])->name('lessons.now.show');
});