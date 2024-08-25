<?php


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PresentController;

use App\Http\Controllers\SheduleController;




Route::group(['middleware' => 'student'], function () {
    Route::get('/shedules', [SheduleController::class, 'show'])->name('shedules.show');

});