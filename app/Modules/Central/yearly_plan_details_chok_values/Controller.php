<?php

namespace App\Modules\Central\yearly_plan_details_chok_values;

use App\Modules\Central\yearly_plan_details_chok_values\Actions\All;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Delete;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Show;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Store;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Update;
use App\Modules\Central\yearly_plan_details_chok_values\Actions\Validation;
use App\Http\Controllers\Controller as ControllersController;
use Illuminate\Support\Facades\DB;

class Controller extends ControllersController
{

    public function index()
    {
        $data = All::execute();
        return $data;
    }

    public function get_chok_column_values_by_chok_id($chok_id) {
        
        $chokColumns = DB::table('yearly_plan_chok_columns AS cc')
        ->where('cc.chok_id', $chok_id)
        ->leftJoin('yearly_plan_details_chok_values AS cv', function ($join) {
            $join->on('cc.chok_id', '=', 'cv.chok_id')
                ->whereColumn('cc.row_no', '=', 'cv.row_no')
                ->whereColumn('cc.col_no', '=', 'cv.col_no');
        })
        ->select('cc.*', 'cv.value AS column_value', 'cv.id AS value_id')
        ->get();

        $groupedData = $chokColumns->groupBy('row_no')->values()->toArray();

        return response()->jason($groupedData);
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