<?php

namespace App\Modules\Central\yearly_plan\Actions;

use App\Modules\Central\yearly_plan\Actions\Validation;
use App\Modules\Central\yearly_plan\Model;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\Central\yearly_plan\Model::class;

    public static function execute(Validation $request)
    {
        try {
            // dd(request()->all());
            if (self::$model::query()->create($request->validated())) {
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}