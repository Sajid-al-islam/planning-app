<?php

namespace App\Modules\Central\yearly_plan_chok_columns\Actions;

use App\Modules\Central\yearly_plan_chok_columns\Actions\Validation;
use App\Modules\Central\yearly_plan_chok_columns\Model;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\Central\yearly_plan_chok_columns\Model::class;

    public static function execute(Validation $request)
    {
        
        try {
            $validation = $request->validated();
            if($validation) {
                Model::where('chok_id', $validation['formData']['chok_id'])->delete();
                foreach ($validation['formData']['chok_columns'] as $key => $item) {
                    $item = (object) $item;
                    $chok_column = new Model();
                    $chok_column->key = $item->chok_column;
                    $chok_column->chok_id = $item->chok_id;
                    $chok_column->save();
                }
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}