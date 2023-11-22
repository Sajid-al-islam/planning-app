<?php

namespace App\Modules\Central\yearly_plan_details\Actions;

use App\Modules\Central\yearly_plan_details\Actions\Validation;
use Illuminate\Support\Facades\Hash;

class Show
{
    static $model = \App\Modules\Central\yearly_plan_details\Model::class;

    public static function execute($id)
    {
        try {
            $with = [
                'dofa',
                'orjitobbo_target',
                'plan',
                'responsibles',
                'divisions' => function ($q) {
                    $q->with(['user']);
                }
            ];
            $query = self::$model::query()->with($with)->where('id', $id);
            $data = $query->first();
            // dd($data->divisions()->toSql());
            if (!$data) {
                return messageResponse('Data not found...', 404, 'error');
            }
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}
