<?php

namespace App\Modules\Central\yearly_plan_chok\Actions;

use App\Modules\Central\yearly_plan_chok\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Show
{
    static $model = \App\Modules\Central\yearly_plan_chok\Model::class;

    public static function execute($id)
    {
        try {
            $with = ['columns'];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}