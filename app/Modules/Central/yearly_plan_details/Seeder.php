<?php
namespace App\Modules\Central\yearly_plan_details;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Central\yearly_plan_details\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "serial" => 1,
            "central_yearly_plan_id" => 1,
            "plan_title" => "Half yealry plan",
            "dofa_id" => 1,
            "how_much_was_incomplete" => 30,
            "ratings" => 4.5,
            "is_approved" => 1,
            "is_public" => 'yes',
            "creator" => 1
        ]);
    }
}