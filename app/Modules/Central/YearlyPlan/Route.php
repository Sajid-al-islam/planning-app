<?php

use App\Modules\Central\YearlyPlan\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plans', Controller::class);
});