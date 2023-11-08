<?php

use App\Modules\Central\yearly_plan_in_archive\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-in-archives', Controller::class);
});