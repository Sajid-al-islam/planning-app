<?php

use App\Modules\tests\Controller;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('tests', Controller::class);
});