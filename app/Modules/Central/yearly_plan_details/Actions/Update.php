<?php

namespace App\Modules\Central\yearly_plan_details\Actions;

use App\Modules\Central\yearly_plan_complete_by_divisions\Model as Yearly_plan_complete_by_divisionsModel;
use App\Modules\Central\yearly_plan_details\Actions\Validation;
use App\Modules\Central\yearly_plan_details\Model;
use Illuminate\Support\Facades\DB;

class Update
{
    static $model = \App\Modules\Central\yearly_plan_details\Model::class;

    public static function execute(Validation $request,$id)
    {
        // dd($request->all());
        try {
            if (!$data = self::$model::query()->where('id', $id)->first()) {
                return messageResponse('Data not found...', 404, 'error');
            }
            // $plan_detail = (object) $plan_detail;
            // $planDetails = Model();
            $data->serial = $request->serial;
            $data->plan_title = $request->plan_title;
            $data->orjitobbo_target_id = $request->orjitobbo_target_id;
            $data->dofa_id = $request->dofa_id;
            $data->save();

            $bastobayonkaris = json_decode(request()->bastobayonkari);
            $bastobayonkari_person = json_decode(request()->bastobayonkari_person_id);

            
            Yearly_plan_complete_by_divisionsModel::where('yearly_plan_details_id', $id)->delete();
            foreach ($bastobayonkaris as $key => $item) {
                $plan_complete_div = new Yearly_plan_complete_by_divisionsModel();
                $plan_complete_div->yearly_plan_details_id = $id;
                $plan_complete_div->user_id = $item;
                $plan_complete_div->yearly_plan_id = request()->plan_id;
                $plan_complete_div->save();
            }
            
            // $data->divisions()->attach($bastobayonkaris);
            $data->responsibles()->syncWithoutDetaching($bastobayonkari_person);
            
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}