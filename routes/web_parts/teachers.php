<?php


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeacherController;




Route::group(['middleware' => 'student'], function () {
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index.my');
});