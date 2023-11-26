<?php

namespace App\Modules\Central\yearly_plan_chok_columns;

use App\Modules\Central\yearly_plan_chok_columns\Actions\All;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Delete;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Show;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Store;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Update;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Validation;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index()
    {
        $data = All::execute();
        return $data;
    }

    public function get_chok_columns_single($chok_id, $table_chok_no) {
        $chok_columns_get = Model::where('chok_id', $chok_id)->where('table_chok_no', $table_chok_no)->get();
        $chok_columns = $chok_columns_get->groupBy('row_no')->values()->toArray();

        return response()->json($chok_columns);
    }

    public function store(Validation $request)
    {
        $data = Store::execute($request);
        return $data;
    }

    public function show($id)
    {
        $data = Show::execute($id);
        return $data;
    }

    public function update(Validation $request)
    {
        $data = Update::execute($request);
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }
}