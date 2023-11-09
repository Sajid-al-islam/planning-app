<?php

use App\Modules\Responsibles\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('responsibles', Controller::class);
});