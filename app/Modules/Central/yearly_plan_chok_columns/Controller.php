<?php

namespace App\Modules\Central\yearly_plan_chok_columns;

use App\Modules\Central\yearly_plan_chok_columns\Actions\All;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Delete;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Show;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Store;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Update;
use App\Modules\Central\yearly_plan_chok_columns\Actions\Validation;
use App\Http\Controllers\Controller as ControllersController;
use Illuminate\Support\Facades\DB;

class Controller extends ControllersController
{

    public function index()
    {
        $data = All::execute();
        return $data;
    }

    public function get_chok_columns_single($chok_id, $table_chok_no) {
        $chok_columns_get = Model::where('chok_id', $chok_id)->where('table_chok_no', $table_chok_no)->get();
        $chok_columns = $chok_columns_get->groupBy('row_no')->values()->toArray();

        return response()->json($chok_columns);
    }

    public function get_chok_columns_single_by_chok($chok_id)  {
        
        $chokColumns = DB::table('yearly_plan_chok_columns AS cc')
        ->where('cc.chok_id', $chok_id)
        ->select('cc.*', 'cv.value AS column_value', 'cv.id AS value_id')
        ->leftJoin('yearly_plan_details_chok_values AS cv', function ($join) {
            $join->on('cc.chok_id', '=', 'cv.chok_id')
                ->whereColumn('cc.row_no', '=', 'cv.row_no')
                ->whereColumn('cc.col_no', '=', 'cv.col_no');
        })
        ->get();
        $groupedData = $chokColumns->groupBy('row_no')->values()->toArray();
        // dd($chok_columns_single);

        return response()->json($groupedData);
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

    public function update(Validation $request)
    {
        $data = Update::execute($request);
        return $data;
    }

    public function destroy($id)
    {
        $data = Delete::execute($id);
        return $data;
    }
}