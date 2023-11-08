<?php

use App\Modules\Central\yearly_plan_hide_for_users\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-hide-for-users', Controller::class);
});