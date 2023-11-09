<?php

namespace App\Modules\Central\yearly_plan_suggestions;

use App\Modules\Central\yearly_plan_suggestions\Actions\All;
use App\Modules\Central\yearly_plan_suggestions\Actions\Delete;
use App\Modules\Central\yearly_plan_suggestions\Actions\Show;
use App\Modules\Central\yearly_plan_suggestions\Actions\Store;
use App\Modules\Central\yearly_plan_suggestions\Actions\Update;
use App\Modules\Central\yearly_plan_suggestions\Actions\Validation;
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