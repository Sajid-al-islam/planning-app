<?php

use App\Modules\Department\Department_plan\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('department_plans', Controller::class);
});