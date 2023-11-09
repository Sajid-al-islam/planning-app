<?php
namespace App\Modules\Central\yearly_plan_suggestions;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Central\yearly_plan_suggestions\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "user_id" => 4,
            "suggestion" => "There should be more section in this plan",
            "creator" => 4
        ]);
    }
}