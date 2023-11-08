<?php

use App\Modules\Central\yearly_plan_chok\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-choks', Controller::class);
});