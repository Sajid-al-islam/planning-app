<?php

namespace App\Modules\Central\yearly_plan_complete_by_divisions\Actions;

use App\Modules\Central\yearly_plan_complete_by_divisions\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\Central\yearly_plan_complete_by_divisions\Model::class;

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