<?php

namespace App\Modules\Central\yearly_plan_details;

use App\Modules\Central\yearly_plan_details\Actions\All;
use App\Modules\Central\yearly_plan_details\Actions\Delete;
use App\Modules\Central\yearly_plan_details\Actions\Show;
use App\Modules\Central\yearly_plan_details\Actions\Store;
use App\Modules\Central\yearly_plan_details\Actions\Update;
use App\Modules\Central\yearly_plan_details\Actions\Validation;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index()
    {
        $data = All::execute();
        return $data;
    }


    public function all_yearly_plans() {
        $data = Model::where('status', 'active')->get();
        return response()->json($data);
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

    public function update(Validation $request, $id)
    {
        $data = Update::execute($request, $id);
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }
}