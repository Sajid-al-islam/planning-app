<?php

use App\Modules\Central\yearly_plan_chok_columns\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-chok-columns', Controller::class);
});