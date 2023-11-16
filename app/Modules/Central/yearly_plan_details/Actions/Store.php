<?php

namespace App\Modules\Central\yearly_plan_details\Actions;

use App\Modules\Central\yearly_plan_details\Actions\Validation;
use App\Modules\Central\yearly_plan_details\Model as YearlyPlanDetails;

class Store
{
    static $model = \App\Modules\Central\yearly_plan_details\Model::class;

    public static function execute(Validation $request)
    {
        try {
            // dd(request()->all());
            $planDetails = new YearlyPlanDetails();
            $planDetails->serial = $request->serial;
            $planDetails->plan_title = $request->kormo_porikolpona;
            $planDetails->orjitobbo_target_id = $request->orjitobbot_target;
            $planDetails->dofa_id = $request->dofa_id;
            $planDetails->save();

            $planDetails->divisions()->attach(request()->bastobayonkari);
            $planDetails->responsibles()->attach(request()->bastobayonkari_person);
            // if (self::$model::query()->create($request->all())) {
            //     return messageResponse('Item added successfully', 201);
            // }
            return messageResponse('Item added successfully', 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}