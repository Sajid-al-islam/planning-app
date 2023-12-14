<?php

namespace App\Modules\Department\Department_plan;

use App\Modules\Department\Department_plan\Actions\All;
use App\Modules\Department\Department_plan\Actions\Delete;
use App\Modules\Department\Department_plan\Actions\Show;
use App\Modules\Department\Department_plan\Actions\Store;
use App\Modules\Department\Department_plan\Actions\Update;
use App\Modules\Department\Department_plan\Actions\Validation;
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