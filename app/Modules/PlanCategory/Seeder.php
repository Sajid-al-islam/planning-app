<?php
namespace App\Modules\PlanCategory;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\PlanCategory\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "title" => "নিয়মিত কাজ",
        ]);
        self::$model::create([
            "title" => "ডেডলাইন ভিত্তিক কাজ",
        ]);
        self::$model::create([
            "title" => "লক্ষ্যমাত্রাভিত্তিক কাজ",
        ]);
        self::$model::create([
            "title" => "মোটিভেশনমূলক কাজ",
        ]);
        self::$model::create([
            "title" => "শিডিউলভিত্তিক কাজ",
        ]);
    }
}

