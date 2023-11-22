<?php

namespace App\Modules\Central\yearly_plan_orjitobbo_targets\Actions;

use App\Modules\Central\yearly_plan_details\Model as Yearly_plan_detailsModel;
use App\Modules\Central\yearly_plan_orjitobbo_targets\Model;

class Delete
{
    static $model = \App\Modules\Central\yearly_plan_orjitobbo_targets\Model::class;

    public static function execute($id)
    {
        try {
            if (!$data=self::$model::find($id)) {
                return messageResponse('Data not found...', 404, 'error');
            }

            $check_plan_details = Yearly_plan_detailsModel::where('orjitobbo_target_id', $id)->first();
            if($check_plan_details != null) {
                return messageResponse('this orjitobbo target is exist in another plan', 400, 'error');
            }

            $data->delete();
            return messageResponse('Item Successfully deleted', 200, 'success');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}