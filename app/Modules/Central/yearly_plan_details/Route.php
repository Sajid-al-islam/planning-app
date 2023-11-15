<?php

use App\Modules\Central\yearly_plan_details\Controller as YearlyPlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-details', YearlyPlanController::class);
    Route::get('get_all_plan_details', [YearlyPlanController::class, 'all_yearly_plans']);
});