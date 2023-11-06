<?php

namespace App\Modules\Cental\YearlyPlan;

use App\Modules\Cental\YearlyPlan\Actions\All;
use App\Modules\Cental\YearlyPlan\Actions\Delete;
use App\Modules\Cental\YearlyPlan\Actions\Show;
use App\Modules\Cental\YearlyPlan\Actions\Store;
use App\Modules\Cental\YearlyPlan\Actions\Update;
use App\Modules\Cental\YearlyPlan\Actions\Validation;
use App\Http\Controllers\Controller as ControllersController;
use Illuminate\Support\Facades\Request;

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