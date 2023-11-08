<?php

namespace App\Modules\Central\yearly_plan_details_chok_values;

use App\Modules\Central\yearly_plan_details_chok_values\Actions\All;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Delete;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Show;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Store;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Update;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Validation;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index()
    {
        $data = All::execute();
        return $data;
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