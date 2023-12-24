<?php
namespace App\Modules\Department\Department_plan;

use App\Models\CommonPlan;
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

        $dept_plan = new self::$model();
        $dept_plan->serial = 1;
        $dept_plan->plan_details = 'শিক্ষাপ্রতিষ্ঠানভিত্তিক নির্দিষ্ট হারে বন্ধু ও সমর্থক বৃদ্ধির টার্গেট নেওয়া হবে।';
        $dept_plan->section = 'section 1';
        $dept_plan->sub_section = 'sub section 1';
        $dept_plan->dofa_id = 1;
        $dept_plan->plan_category_id = 1;
        $dept_plan->numeric_value = 1500;
        $dept_plan->deadline = Carbon::parse('13-12-2023')->toDateString();
        $dept_plan->complete_month = 'January';
        $dept_plan->how_much_was_incomplete = 20;
        $dept_plan->comment = 'plan 1';
        $dept_plan->budget_id = 1;
        $dept_plan->is_archive = 1;
        $dept_plan->umbrella_id = 1;
        $dept_plan->save();

        // self::$model::create([
        //     'serial' => 1,
        //     'plan_details' => 'শিক্ষাপ্রতিষ্ঠানভিত্তিক নির্দিষ্ট হারে বন্ধু ও সমর্থক বৃদ্ধির টার্গেট নেওয়া হবে।',
        //     'section' => 'section 1',
        //     'sub_section' => 'sub section 1',
        //     'dofa_id' => 1,
        //     'plan_category_id' => 1,
        //     'numeric_value' => 1500,
        //     'deadline' => Carbon::parse('13-12-2023')->toDateString(),
        //     'complete_month' => 'January',
        //     'how_much_was_incomplete' => 20,
        //     'comment' => 'plan 1',
        //     'budget_id' => 1,
        //     'is_archive' => 1,
        //     'umbrella_id' => 1
        // ]);

        $common_plan = new CommonPlan();
        $common_plan->department_plan_id = $dept_plan->id;
        $common_plan->plan_title = $dept_plan->plan_details;
        $common_plan->deadline = $dept_plan->deadline;
        $common_plan->dofa_id = $dept_plan->dofa_id;
        $common_plan->how_much_was_incomplete = $dept_plan->how_much_was_incomplete;
        $common_plan->is_archive = 0;
        $common_plan->is_department = 1;
        $common_plan->save();

        $dept_plan = new self::$model();
        $dept_plan->serial = 2;
        $dept_plan->plan_details = 'সংগঠনের অনলাইন নীতিমালা অনুসরণ করে তথ্যপ্রযুক্তি (SMS, ই-মেইল, সামাজিক যোগাযোগমাধ্যম ইত্যাদি) ব্যবহারের মাধ্যমে জনশক্তির দাওয়াতি কাজে অংশগ্রহণ নিশ্চিত করা হবে।';
        $dept_plan->section = 'section 2';
        $dept_plan->sub_section = 'sub section 2';
        $dept_plan->dofa_id = 2;
        $dept_plan->plan_category_id = 2;
        $dept_plan->numeric_value = 1200;
        $dept_plan->deadline = Carbon::parse('14-12-2023')->toDateString();
        $dept_plan->complete_month = 'February';
        $dept_plan->how_much_was_incomplete = 25;
        $dept_plan->comment = 'plan 1';
        $dept_plan->budget_id = 1;
        $dept_plan->is_archive = 1;
        $dept_plan->umbrella_id = 1;
        $dept_plan->save();

        $common_plan = new CommonPlan();
        $common_plan->department_plan_id = $dept_plan->id;
        $common_plan->plan_title = $dept_plan->plan_details;
        $common_plan->deadline = $dept_plan->deadline;
        $common_plan->dofa_id = $dept_plan->dofa_id;
        $common_plan->how_much_was_incomplete = $dept_plan->how_much_was_incomplete;
        $common_plan->is_archive = 0;
        $common_plan->is_department = 1;
        $common_plan->save();

        // self::$model::create([
        //     'serial' => 2,
        //     'plan_details' => 'সংগঠনের অনলাইন নীতিমালা অনুসরণ করে তথ্যপ্রযুক্তি (SMS, ই-মেইল, সামাজিক যোগাযোগমাধ্যম ইত্যাদি) ব্যবহারের মাধ্যমে জনশক্তির দাওয়াতি কাজে অংশগ্রহণ নিশ্চিত করা হবে।',
        //     'section' => 'section 2',
        //     'sub_section' => 'sub section 2',
        //     'dofa_id' => 2,
        //     'plan_category_id' => 2,
        //     'numeric_value' => 1200,
        //     'deadline' => Carbon::parse('14-12-2023')->toDateString(),
        //     'complete_month' => 'February',
        //     'how_much_was_incomplete' => 25,
        //     'comment' => 'plan 1',
        //     'budget_id' => 1,
        //     'is_archive' => 1,
        //     'umbrella_id' => 1
        // ]);
    }
}