<?php
namespace App\Modules\Central\yearly_plan_orjitobbo_targets;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Central\yearly_plan_orjitobbo_targets\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "serial" => 1,
            "title" => "scholarship program",
            "amount" => 10,
            "yearly_plan_id" => 1,
            "yearly_plan_details_id" => 1,
        ]);
    }
}