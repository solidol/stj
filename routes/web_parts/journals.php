<?php



use Illuminate\Support\Facades\Route;


use App\Http\Controllers\JournalController;
use App\Http\Controllers\MarkController;


Route::group(['middleware' => 'student'], function () {
    Route::get('/journals/{journal}/marks', [MarkController::class, 'index'])->name('journals.marks.index');
    Route::get('/journals', [JournalController::class, 'index'])->name('journals.index');
});