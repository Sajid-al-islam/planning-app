<?php

use App\Modules\Central\yearly_plan_suggestions\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-suggestions', Controller::class);
});