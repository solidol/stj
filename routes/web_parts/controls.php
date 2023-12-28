<?php

use App\Http\Controllers\ControlController;
use App\Http\Controllers\PracticeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::get('/practices/{practice}', [PracticeController::class, 'show'])->name('practices.show');
});
