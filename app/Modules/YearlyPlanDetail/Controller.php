<?php

namespace App\Modules\Central\YearlyPlanDetail;

use App\Modules\Central\YearlyPlanDetail\Actions\All;
use App\Modules\Central\YearlyPlanDetail\Actions\Delete;
use App\Modules\Central\YearlyPlanDetail\Actions\Show;
use App\Modules\Central\YearlyPlanDetail\Actions\Store;
use App\Modules\Central\YearlyPlanDetail\Actions\Update;
use App\Http\Controllers\Controller as ControllersController;
use App\Modules\Central\YearlyPlanDetail\Actions\Validation;

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