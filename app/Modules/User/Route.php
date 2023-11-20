<?php

use App\Modules\User\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('users', Controller::class);
    Route::get('user/get-division-users', [Controller::class, 'get_all_divisions']);
});
