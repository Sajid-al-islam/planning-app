<?php
namespace App\Modules\Dofa;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Dofa\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "serial" => 1,
            "title" => "দাওয়াত",
            "yealy_plan_id" => 1,
            "yealy_plan_details_id" => 1,
        ]);
        
    }
}