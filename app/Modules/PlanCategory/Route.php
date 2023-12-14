<?php

use App\Modules\PlanCategory\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('plan-categories', Controller::class);
});