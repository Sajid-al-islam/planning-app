<?php
namespace App\Modules\Department\Department_plan;

use Carbon\Carbon;
use Illuminate\Database\Seeder as SeedersSeeder;

class Seeder extends SeedersSeeder
{
    /**
     * Run the database seeds.
     */
    static $model = \App\Modules\Department\Department_plan\Model::class;
    public function run(): void
    {
        self::$model::truncate();
        self::$model::create([
            'serial' => 1,
            'plan_details' => 'শিক্ষাপ্রতিষ্ঠানভিত্তিক নির্দিষ্ট হারে বন্ধু ও সমর্থক বৃদ্ধির টার্গেট নেওয়া হবে।',
            'section' => 'section 1',
            'sub_section' => 'sub section 1',
            'dofa_id' => 1,
            'plan_category_id' => 1,
            'numeric_value' => 1500,
            'deadline' => Carbon::parse('13-12-2023')->toDateString(),
            'complete_month' => 'January',
            'how_much_was_incomplete' => 20,
            'comment' => 'plan 1',
            'budget_id' => 1,
            'is_archive' => 1,
            'umbrella_id' => 1
        ]);

        self::$model::create([
            'serial' => 2,
            'plan_details' => 'সংগঠনের অনলাইন নীতিমালা অনুসরণ করে তথ্যপ্রযুক্তি (SMS, ই-মেইল, সামাজিক যোগাযোগমাধ্যম ইত্যাদি) ব্যবহারের মাধ্যমে জনশক্তির দাওয়াতি কাজে অংশগ্রহণ নিশ্চিত করা হবে।',
            'section' => 'section 2',
            'sub_section' => 'sub section 2',
            'dofa_id' => 2,
            'plan_category_id' => 2,
            'numeric_value' => 1200,
            'deadline' => Carbon::parse('14-12-2023')->toDateString(),
            'complete_month' => 'February',
            'how_much_was_incomplete' => 25,
            'comment' => 'plan 1',
            'budget_id' => 1,
            'is_archive' => 1,
            'umbrella_id' => 1
        ]);
    }
}