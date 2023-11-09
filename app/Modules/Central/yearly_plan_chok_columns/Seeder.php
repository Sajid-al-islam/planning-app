<?php
namespace App\Modules\Central\yearly_plan_chok_columns;

use App\Modules\Central\yearly_plan_chok\Model as Chok;
use App\Modules\Central\yearly_plan_details_chok_values\Model as ChokValueModel;
use Illuminate\Database\Seeder as SeedersSeeder;
use Illuminate\Support\Facades\DB;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Central\yearly_plan_chok_columns\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        DB::table('yearly_plan_chok_columns')->truncate();

        $choks = [
            "sports club" => [
                "school name",
                "class",
                "total player",
            ],
            "kk path protijogita" => [
                "school name",
                "total participants",
            ]
        ];

        $chok_one_values = [
            "1" => [
                "1" => "Pahartali school", //school name
                "2" => "class 7", // class name
                "3" => 200, // total player amount
            ],
            "1" => [
                "1" => "halishahar school", //school name
                "2" => "class 6", // class name
                "3" => 210, // total player amount
            ]
        ];

        $chok_two_values = [
            "2" => [
                "4" => "Pahartali school", //school name
                "5" => 400, // participants
            ],
            "2" => [
                "4" => "halishahar school", //school name
                "5" => 500 , // participants
            ]
        ];

        foreach($choks as $chok_title => $chok_colums) {
            $chok = new Chok();
            $chok->title = $chok_title;
            $chok->save();
            foreach ($chok_colums as $key => $chok_colum) {
                self::$model::create([
                    "key" => $chok_colum,
                ]);
            }
        }

        $serial = 0;
        foreach ($chok_one_values as $chok_id => $chok_values) {
            foreach ($chok_values as $chok_column_id => $chok_value) {
                $serial++;
                $chok_value = new ChokValueModel();
                $chok_value->serial = $serial;
                $chok_value->value = $chok_value;
                $chok_value->yearly_plan_id = 1;
                $chok_value->yearly_plan_details_id = 1;
                $chok_value->yearly_plan_details_chok_id = $chok_id;
                $chok_value->yearly_plan_details_chok_column_id = $chok_column_id;
                $chok_value->save();
            }
        }

        foreach ($chok_two_values as $chok_id => $chok_values) {
            foreach ($chok_values as $chok_column_id => $chok_value) {
                $serial++;
                $chok_value = new ChokValueModel();
                $chok_value->serial = $serial;
                $chok_value->value = $chok_value;
                $chok_value->yearly_plan_id = 1;
                $chok_value->yearly_plan_details_id = 1;
                $chok_value->yearly_plan_details_chok_id = $chok_id;
                $chok_value->yearly_plan_details_chok_column_id = $chok_column_id;
                $chok_value->save();
            }
        }
        $serial = 0;
    }
}