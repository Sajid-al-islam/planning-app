<?php

namespace App\Modules\tests;

use App\Modules\tests\Actions\All;
use App\Modules\tests\Actions\Delete;
use App\Modules\tests\Actions\Show;
use App\Modules\tests\Actions\Store;
use App\Modules\tests\Actions\Update;
use App\Modules\tests\Actions\Validation;
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