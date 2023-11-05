<?php

use App\Http\Controllers\Auth\ApiLoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("v1")->middleware('guest:api')->group(function () {
    Route::post('/get-token', [ApiLoginController::class, 'get_token']);
    Route::post('/api-login', [ApiLoginController::class, 'login']);
    Route::post('/api-register', [ApiLoginController::class, 'register']);
    Route::get('/auth-check', [ApiLoginController::class, 'auth_check']);
    Route::post('/forget-mail', [ApiLoginController::class, 'forget_mail']);
    Route::post('/check-code', [ApiLoginController::class, 'check_code']);
    Route::post('/logout-from-all-devices', [ApiLoginController::class, 'logout_from_all_devices']);
});
