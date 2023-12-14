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
            "title" => "দাওয়াত"
        ]);
        self::$model::create([
            "serial" => 2,
            "title" => "সংগঠন"
        ]);
        self::$model::create([
            "serial" => 3,
            "title" => "প্রশিক্ষন"
        ]);
        self::$model::create([
            "serial" => 4,
            "title" => "ইসলামী শিক্ষা আন্দোলন ও ছাত্র সমস্যা"
        ]);
        self::$model::create([
            "serial" => 4,
            "title" => "ইসলামী সমাজ বিনির্মাণ"
        ]);
        
    }
}