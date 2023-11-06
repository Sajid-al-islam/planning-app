<?php

use App\Modules\Central\yearly_plan\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plans', Controller::class);
});