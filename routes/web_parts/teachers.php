<?php


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeacherController;




Route::group(['middleware' => 'student'], function () {
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::get('/files/teachers/{id}.jpg', [TeacherController::class, 'avatar'])->name('teacher.avatar.get');
});