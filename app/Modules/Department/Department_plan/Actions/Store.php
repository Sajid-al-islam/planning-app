<?php

namespace App\Modules\Department\Department_plan\Actions;

use App\Models\CommonPlan;
use App\Modules\Department\Department_plan\Actions\Validation;
use App\Modules\Department\Department_plan\Model;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\Department\Department_plan\Model::class;

    public static function execute(Validation $request)
    {
        try {
            // dd($request->all());
            // if (self::$model::query()->create($request->validated())) {
            $dept_plan = new Model();
            $dept_plan->serial = $request->serial;
            $dept_plan->plan_details = $request->plan_details;
            $dept_plan->section = $request->section;
            $dept_plan->sub_section = $request->sub_section;
            $dept_plan->dofa_id = $request->dofa_id;
            $dept_plan->plan_category_id = $request->plan_category_id;
            $dept_plan->numeric_value = $request->numeric_value;
            $dept_plan->deadline = $request->deadline;
            $dept_plan->complete_month = $request->complete_month;
            $dept_plan->how_much_was_incomplete = $request->how_much_was_incomplete;
            $dept_plan->comment = $request->comment;
            $dept_plan->budget_id = $request->budget_id;
            $dept_plan->is_archive = $request->is_archive;
            $dept_plan->umbrella_id = $request->umbrella_id;
            $dept_plan->save();


            $common_plan = new CommonPlan();
            $common_plan->department_plan_id = $dept_plan->id;
            $common_plan->plan_title = $dept_plan->plan_details;
            $common_plan->dofa_id = $dept_plan->dofa_id;
            $common_plan->how_much_was_incomplete = $dept_plan->how_much_was_incomplete;
            $common_plan->is_archive = $dept_plan->is_archive;
            $common_plan->is_department = 1;
            $common_plan->save();
            return messageResponse('Item added successfully', 201);
            // }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}