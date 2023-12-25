<?php

use App\Http\Controllers\LogController;

Route::group(['middleware' => 'admin'], function () {
        Route::get('/events', [LogController::class, 'index'])->name('events.index');
    });

?>