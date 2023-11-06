<?php

use App\Modules\Dofa\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('dofas', Controller::class);
});