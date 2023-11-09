<?php
namespace App\Modules\Responsibles;

use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Responsibles\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            "title" => "উপশাখা সভাপতি",
        ]);

        self::$model::create([
            "title" => "ওয়ার্ড সভাপতি",
        ]);

        self::$model::create([
            "title" => "থানা সভাপতি",
        ]);

        self::$model::create([
            "title" => "সংশ্লিষ্ট বৈঠকের দায়িত্বশীল",
        ]);

        self::$model::create([
            "title" => "উপশাখা",
        ]);

        self::$model::create([
            "title" => "ওয়ার্ড",
        ]);

        self::$model::create([
            "title" => "থানা",
        ]);

        self::$model::create([
            "title" => "মহানগরী",
        ]);

        self::$model::create([
            "title" => "কেন্দ্র",
        ]);

        self::$model::create([
            "title" => "উর্দ্ধতন স্তর দায়িত্বশীল",
        ]);

        self::$model::create([
            "title" => "সংশ্লিষ্ট স্তর দায়িত্বশীল",
        ]);

        self::$model::create([
            "title" => "প্রত্যেক জনশক্তি",
        ]);

    }
}