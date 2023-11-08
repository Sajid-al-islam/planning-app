<?php

use App\Modules\Central\yearly_plan_complete_by_divisions\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-complete-by-divisions', Controller::class);
});