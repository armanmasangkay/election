<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrecinctController;
use App\Http\Controllers\VoteController;
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

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/account/new', [AccountController::class, 'newAccount']);

    Route::post('/account/new', [AccountController::class, 'saveNewAccount']);

    Route::get('/change-password', [AuthController::class, 'changePasswordForm']);

    Route::post('/change-password', [AuthController::class, 'changePassword']);

    Route::get('/precincts', [PrecinctController::class, 'precincts']);

    Route::post('/precincts/new', [PrecinctController::class, 'newPrecinct']);

    Route::get(
        '/precincts/delete/{precinct}',
        [PrecinctController::class, 'deletePrecinct']
    );

    Route::get(
        '/precincts/edit/{precinct}',
        [PrecinctController::class, 'editPrencinct']
    );

    Route::post(
        '/precincts/update/{precinct}',
        [PrecinctController::class, 'updatePrecinct']
    );
    Route::get('/candidate/new', [CandidateController::class, 'index']);
    Route::post('/candidate/new', [CandidateController::class, 'store']);

    Route::get('/encode/vote', [VoteController::class, 'index']);
});


Route::get('/login', [AuthController::class, 'loginForm']);

Route::post('/login',[AuthController::class, 'login']);

