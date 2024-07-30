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


Route::get('/login/token:{rawToken}', function ($rawToken) {
    //$userToken = PersonalAccessToken::findToken($rawToken);
    $t = explode('|', $rawToken);
    $t[1] = hash('sha256', $t[1]);
    dd($t);
    $userToken = PersonalAccessToken::where("id", $t[0])->where("token", $t[1])->get()->first();
    if ($userToken) {
        $user = $userToken->tokenable;
        Auth::loginUsingId($user->id);
        return redirect('/home');
    } else {
        return abort('406');
    }
});

Auth::routes([
    'register' => false,
    // Registration Routes...
    'reset' => false,
    // Password Reset Routes...
    'verify' => false,
    // Email Verification Routes...
]);

