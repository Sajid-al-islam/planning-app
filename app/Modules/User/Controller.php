<?php

namespace App\Modules\User;

use App\Modules\User\Actions\All;
use App\Modules\User\Actions\Delete;
use App\Modules\User\Actions\Show;
use App\Modules\User\Actions\Store;
use App\Modules\User\Actions\Update;
use App\Modules\User\Actions\Validation;
use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index()
    {
        $data = All::execute();
        return $data;
    }

    public function get_all_divisions() {
        $divisions = Model::whereExists(
            function($query) {  
                $query->from('user_user_role')
                    ->whereIn('user_user_role.user_role_id', [4])
                    ->whereColumn('user_user_role.user_id', 'users.id');
            })->get();
        return response()->json($divisions);
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

    public function update($request, $id)
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
