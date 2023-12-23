<?php

namespace App\Modules\Central\yearly_plan_details\Actions;

use App\Models\CommonPlan;
use App\Modules\Central\yearly_plan_complete_by_divisions\Model;
use App\Modules\Central\yearly_plan_details\Actions\Validation;
use App\Modules\Central\yearly_plan_details\Model as YearlyPlanDetails;

class Store
{
    static $model = \App\Modules\Central\yearly_plan_details\Model::class;

    public static function execute(Validation $request)
    {
        try {
            // dd(request()->all());
            foreach ($request->formData as $key => $plan_detail) {
                
                $plan_detail = (object) $plan_detail;
                $planDetails = new YearlyPlanDetails();
                $planDetails->serial = $plan_detail->serial;
                $planDetails->plan_title = $plan_detail->kormo_porikolpona;
                $planDetails->how_much_was_incomplete = $plan_detail->incomplete_part;
                $planDetails->ratings = $plan_detail->rating;
                $planDetails->orjitobbo_target_id = $plan_detail->orjitobbo_target;
                $planDetails->dofa_id = $plan_detail->dofa;
                $planDetails->save();
    
                // $planDetails->divisions()->attach(request()->bastobayonkari);
                // $div_check = Model::where('yearly_plan_details_id', $plan_detail->id)->first();
                foreach ($plan_detail->bastobayonkari as $key => $item) {
                    $plan_complete_div = new Model();
                    $plan_complete_div->yearly_plan_details_id = $planDetails->id;
                    $plan_complete_div->user_id = $item;
                    $plan_complete_div->yearly_plan_id = request()->plan_id;
                    $plan_complete_div->save();
                }
                $planDetails->responsibles()->attach(request()->bastobayonkari_person);
            }

            $common_plan = new CommonPlan();
            $common_plan->central_plan_id = $planDetails->id;
            $common_plan->plan_title = $planDetails->plan_title;
            $common_plan->dofa_id = $planDetails->dofa_id;
            $common_plan->how_much_was_incomplete = $planDetails->how_much_was_incomplete;
            $common_plan->is_archive = $planDetails->is_archive;
            $common_plan->is_department = 0;
            $common_plan->save();
            // if (self::$model::query()->create($request->all())) {
            //     return messageResponse('Item added successfully', 201);
            // }
            return messageResponse('Item added successfully', 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}