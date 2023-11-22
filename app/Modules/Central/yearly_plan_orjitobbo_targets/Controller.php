<?php

namespace App\Modules\Central\yearly_plan_orjitobbo_targets;

use App\Modules\Central\yearly_plan_orjitobbo_targets\Actions\All;
use App\Modules\Central\yearly_plan_orjitobbo_targets\Actions\Delete;
use App\Modules\Central\yearly_plan_orjitobbo_targets\Actions\Show;
use App\Modules\Central\yearly_plan_orjitobbo_targets\Actions\Store;
use App\Modules\Central\yearly_plan_orjitobbo_targets\Actions\Update;
use App\Modules\Central\yearly_plan_orjitobbo_targets\Actions\Validation;
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

    public function update(Model $yearly_plan_orjitobbo_target, Validation $request)
    {
        $data = Update::execute($request, $yearly_plan_orjitobbo_target);
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }
}