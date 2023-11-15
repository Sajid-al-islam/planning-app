<?php

namespace App\Modules\Central\yearly_plan_orjitobbo_targets\Actions;

use App\Modules\Central\yearly_plan_orjitobbo_targets\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\Central\yearly_plan_orjitobbo_targets\Model::class;

    public static function execute(Validation $request)
    {
        try {
            if (self::$model::query()->create($request->all())) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}