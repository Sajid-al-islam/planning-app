<?php
namespace App\Modules\Central\yearly_plan;

use Carbon\Carbon;
use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Central\yearly_plan\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "session" => Carbon::today()->startOfYear(),
            "creator" => 1,
        ]);
    }
}