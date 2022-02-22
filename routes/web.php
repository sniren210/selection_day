<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index']);
Route::get('/vote', [LandingController::class, 'vote']);

Route::prefix('user')->group(function () {

    Route::middleware(['auth'])->group(function () {
        Route::get('/vote', [VoteController::class, 'index']);
        Route::post('/vote', [VoteController::class, 'store']);

        Route::get('/show', [ProfileController::class, 'index']);
    });
});

Auth::routes([
    'reset'    => false,
]);

Route::middleware(['auth', 'userInvalid'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::resource('/user', UserController::class);
    Route::get('/user-verified', [UserController::class, 'verified']);
    Route::put('/user-verified/{user}', [UserController::class, 'verify']);
    Route::delete('/user-verified/{user}', [UserController::class, 'denied']);

    Route::resource('/candidate', CandidateController::class,);

    // Route::get('/vote', [VoteController::class, 'index']);
    Route::get('/vote-user', [VoteController::class, 'user']);
});
