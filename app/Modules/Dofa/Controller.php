<?php

namespace App\Modules\Dofa;

use App\Modules\Dofa\Actions\All;
use App\Modules\Dofa\Actions\Delete;
use App\Modules\Dofa\Actions\Show;
use App\Modules\Dofa\Actions\Store;
use App\Modules\Dofa\Actions\Update;
use App\Modules\Dofa\Actions\Validation;
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

    public function update(Model $dofa,Validation $request)
    {
        $data = Update::execute($dofa, $request);
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }
}