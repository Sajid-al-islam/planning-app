<?php

use App\Modules\Central\yearly_plan_details_edit_history\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-details-edit-histories', Controller::class);
});