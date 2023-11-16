<?php
namespace App\Modules\Central\yearly_plan_complete_by_divisions;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Central\yearly_plan_complete_by_divisions\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "user_id" => 4,
            "yearly_plan_id" => 1,
            "yearly_plan_details_id" => 1,
        ]);

        self::$model::create([
            "user_id" => 5,
            "yearly_plan_id" => 1,
            "yearly_plan_details_id" => 1,
        ]);

        self::$model::create([
            "user_id" => 6,
            "yearly_plan_id" => 1,
            "yearly_plan_details_id" => 1,
        ]);
    }
}