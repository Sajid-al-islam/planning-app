<?php

namespace App\Modules\Central\yearly_plan\Actions;

use App\Modules\Central\yearly_plan\Actions\Validation;
use App\Modules\Central\yearly_plan\Model;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\Central\yearly_plan\Model::class;

    public static function execute(Validation $request)
    {
        try {
            // dd(request()->all());
            $planDetails = new Model();
            $planDetails->serial = $request->serial;
            $planDetails->plan_title = $request->kormo_porikolpona;
            $planDetails->orjitobbot_target = $request->orjitobbot_target;
            $planDetails->dofa_id = $request->dofa_id;
            $planDetails->save();
            
            
            // if (self::$model::query()->create($request->validated())) {
            //     return messageResponse('Item added successfully', 201);
            // }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}