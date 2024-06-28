<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('start');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    require_once __DIR__ . '/web_parts/teachers.php';
    require_once __DIR__ . '/web_parts/lessons.php';
    require_once __DIR__ . '/web_parts/marks.php';
    require_once __DIR__ . '/web_parts/absents.php';
    require_once __DIR__ . '/web_parts/journals.php';
    require_once __DIR__ . '/web_parts/events.php';
    require_once __DIR__ . '/web_parts/users.php';
    require_once __DIR__ . '/web_parts/mdb.php';

    require_once __DIR__ . '/web_parts/controls.php';
});


Route::get('/login/token:{hashedTooken}', function ($hashedTooken) {
    $token = PersonalAccessToken::findToken($hashedTooken);
    $user = $token->tokenable;
    Auth::loginUsingId($user->id);
    return redirect('/home');
});

Auth::routes([
    'register' => false,
    // Registration Routes...
    'reset' => false,
    // Password Reset Routes...
    'verify' => false,
    // Email Verification Routes...
]);

