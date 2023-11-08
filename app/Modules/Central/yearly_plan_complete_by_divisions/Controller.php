<?php

namespace App\Modules\Central\yearly_plan_complete_by_divisions;

use App\Modules\Central\yearly_plan_complete_by_divisions\Actions\All;
use App\Modules\Central\yearly_plan_complete_by_divisions\Actions\Delete;
use App\Modules\Central\yearly_plan_complete_by_divisions\Actions\Show;
use App\Modules\Central\yearly_plan_complete_by_divisions\Actions\Store;
use App\Modules\Central\yearly_plan_complete_by_divisions\Actions\Update;
use App\Modules\Central\yearly_plan_complete_by_divisions\Actions\Validation;
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