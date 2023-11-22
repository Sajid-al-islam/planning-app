<?php

namespace App\Modules\Dofa\Actions;

use App\Modules\Central\yearly_plan_details\Model;

class Delete
{
    static $model = \App\Modules\Dofa\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data=self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $check_plan_details = Model::where('dofa_id', $id)->first();
            if($check_plan_details != null) {
                return messageResponse('this dofa is exist in another plan', 400, 'error');
            }

            $data->delete();
            return messageResponse('Item Successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}