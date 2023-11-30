<?php

use App\Modules\Central\yearly_plan_details_chok_values\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-details-chok-values', Controller::class);
    Route::post('yearly-plan-details-chok-values/store', [Controller::class, 'store']);
});