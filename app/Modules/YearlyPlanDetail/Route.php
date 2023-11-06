<?php

namespace App\Modules\Central\YearlyPlanDetail\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-details', Controller::class);
});