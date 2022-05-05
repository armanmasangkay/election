<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EncodeResultController;
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

Route::get('/test', function() {
    
});

Route::get('/count/{municipality}', [DashboardController::class, 'index']);
Route::get('/live/{municipality}/{position}', [DashboardController::class, 'live']);

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/account/new', [AccountController::class, 'newAccount']);

    Route::post('/account/new', [AccountController::class, 'saveNewAccount']);

    Route::get('/accounts', [AccountController::class, 'viewAccounts']);

    Route::get('/accounts/reset/{id}', [AccountController::class, 'resetPassword']);

    Route::get('/change-password', [AuthController::class, 'changePasswordForm']);

    Route::post('/change-password', [AuthController::class, 'changePassword']);

    Route::middleware('allow:Admin')->group(function () {

        Route::get('/candidates', [CandidateController::class, 'index']);
    
        Route::get('/candidate/new', [CandidateController::class, 'addNew']);
    
        Route::post('/candidate/new', [CandidateController::class, 'store']);

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
    
    });

    Route::middleware('allow:PPCRV')->group(function () {

        Route::get('/encode', [EncodeResultController::class, 'index']);

        Route::post('/encode', [EncodeResultController::class, 'storeResult']);
    });

    
});


Route::get('/login', [AuthController::class, 'loginForm']);

Route::post('/login',[AuthController::class, 'login']);

