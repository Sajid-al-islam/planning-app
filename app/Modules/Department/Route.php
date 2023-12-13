<?php

use App\Modules\Department\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('department-plans', Controller::class);
});