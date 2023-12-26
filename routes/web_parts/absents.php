<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AbsentController;

Route::group(['middleware' => 'student'], function () {
    Route::get('/absents/{year?}/{month?}', [AbsentController::class, 'table'])->name('absents.index');
});