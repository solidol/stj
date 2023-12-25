<?php


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PresentController;

use App\Http\Controllers\MarkController;




Route::group(['middleware' => 'student'], function () {
    Route::get('/marks/journal:{journal}', [MarkController::class, 'index'])->name('marks.index');

});