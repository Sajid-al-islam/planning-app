<?php

namespace App\Modules\Cental\YearlyPlan\Actions;

class Delete
{
    static $model = \App\Modules\YearlyPlan\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data=self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }
            $data->delete();
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}