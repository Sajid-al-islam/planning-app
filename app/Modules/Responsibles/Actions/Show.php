<?php

namespace App\Modules\Responsibles\Actions;

use App\Modules\Responsibles\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Show
{
    static $model = \App\Modules\Responsibles\Model::class;

    public static function execute($id)
    {
        try {
            $with = [];
            if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}