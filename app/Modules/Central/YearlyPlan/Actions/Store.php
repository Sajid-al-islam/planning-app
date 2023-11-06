<?php

namespace App\Modules\Cental\YearlyPlan\Actions;

use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\YearlyPlan\Model::class;

    public static function execute(Validation $request)
    {
        try {
            if (self::$model::query()->create($request->validated())) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}