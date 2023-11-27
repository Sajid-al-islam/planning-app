<?php

use App\Modules\Central\yearly_plan_chok_columns\Controller;
// use App\Modules\Central\yearly_plan_chok_columns\Controller;
use Illuminate\Support\Facades\Route;
// use App\Modules\Central\yearly_plan_chok_columns\Actions\Update;
Route::prefix('v1')->group(function () {
    Route::apiResource('yearly-plan-chok-columns', Controller::class);
    Route::get('yearly-plan-chok-columns/{chok_id}/{table_chok_no}', [Controller::class, 'get_chok_columns_single']);
    Route::get('yearly-plan-chok-columns-by-chok/{chok_id}', [Controller::class, 'get_chok_columns_single_by_chok']);
    Route::post('yearly-plan-chok-columns/update', [Controller::class, 'update']);
});