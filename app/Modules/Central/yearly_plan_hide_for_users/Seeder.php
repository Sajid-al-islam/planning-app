<?php
namespace App\Modules\Central\yearly_plan_hide_for_users;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Central\yearly_plan_hide_for_users\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "title" => " ",
        ]);
    }
}