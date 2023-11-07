<?php

use App\Modules\Central\yearly_plan_orjitobbo_targets\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-orjitobbo-targets', Controller::class);
});