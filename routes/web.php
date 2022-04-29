<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
});


Route::get('/login', [AuthController::class, 'loginForm']);

Route::post('/login',[AuthController::class, 'login']);

