<?php
namespace App\Modules\Central\yearly_plan_details;

use App\Models\CommonPlan;
use App\Modules\Central\yearly_plan_details_completion_time\Model as CompletionModel;
use Carbon\Carbon;
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
        $yearly_plan = new self::$model();    
        $yearly_plan->central_yearly_plan_id = 1;
        $yearly_plan->plan_title = "১. প্রতিটি ওয়ার্ড ও উপশাখায় প্রতি ৩ জনে একটা দাওয়াতি গ্রুপ গঠন নিশ্চিত করা।";
        $yearly_plan->dofa_id = 1;
        $yearly_plan->orjitobbo_target_id = 1;
        $yearly_plan->how_much_was_incomplete = 30;
        $yearly_plan->ratings = 4.5;
        $yearly_plan->is_approved = 1;
        $yearly_plan->is_public = 'yes';
        $yearly_plan->creator = 1;
        $yearly_plan->save();

        $common_plan = new CommonPlan();
        $common_plan->central_plan_id = $yearly_plan->id;
        $common_plan->plan_title = $yearly_plan->plan_title;
        $common_plan->dofa_id = $yearly_plan->dofa_id;
        $common_plan->how_much_was_incomplete = $yearly_plan->how_much_was_incomplete;
        $common_plan->is_archive = 0;
        $common_plan->is_department = 0;
        $common_plan->save();

        $completion = new CompletionModel();
        $completion->start_date = Carbon::today()->toDateString();
        $completion->end_date = Carbon::today()->addDays(90)->toDateString();
        $completion->yearly_plan_details_id = 1;
        $completion->yearly_plan_id = 1;
        $completion->save();

        $yearly_plan = new self::$model();
        $yearly_plan->central_yearly_plan_id = 1;
        $yearly_plan->plan_title = "সকল জনশক্তিকে দাওয়াতি কাজে অভ্যস্ত করতে দায়িত্বশীলগণ প্রোগ্রামসমূহে তত্ত্বাবধান করবেন। পাশাপাশি পারস্পরিক যোগাযোগের সময়ে সকল জনশক্তি ব্যক্তিগত দাওয়াতি কাজের ব্যাপারে একে অপরের খোঁজখবর নেবেন।";
        $yearly_plan->dofa_id = 1;
        $yearly_plan->orjitobbo_target_id = 1;
        $yearly_plan->how_much_was_incomplete = 30;
        $yearly_plan->ratings = 4.5;
        $yearly_plan->is_approved = 1;
        $yearly_plan->is_public = 'yes';
        $yearly_plan->creator = 1;
        $yearly_plan->save();

        $common_plan = new CommonPlan();
        $common_plan->central_plan_id = $yearly_plan->id;
        $common_plan->plan_title = $yearly_plan->plan_title;
        $common_plan->dofa_id = $yearly_plan->dofa_id;
        $common_plan->how_much_was_incomplete = $yearly_plan->how_much_was_incomplete;
        $common_plan->is_archive = 0;
        $common_plan->is_department = 0;
        $common_plan->save();

        $completion = new CompletionModel();
        $completion->start_date = Carbon::today()->toDateString();
        $completion->end_date = Carbon::today()->addDays(90)->toDateString();
        $completion->yearly_plan_details_id = 2;
        $completion->yearly_plan_id = 1;
        $completion->save();
        
        $yearly_plan = new self::$model();
        $yearly_plan->central_yearly_plan_id = 1;
        $yearly_plan->plan_title = "দাওয়াতি কাজে উদ্বুদ্ধকরণে দায়িত্বশীলগণ পরিকল্পিতভাবে জনশক্তিদেরকে সাথে নিয়ে দাওয়াতি কাজ করবেন।";
        $yearly_plan->dofa_id = 1;
        $yearly_plan->orjitobbo_target_id = 1;
        $yearly_plan->how_much_was_incomplete = 30;
        $yearly_plan->ratings = 4.5;
        $yearly_plan->is_approved = 1;
        $yearly_plan->is_public = 'yes';
        $yearly_plan->creator = 1;
        $yearly_plan->save();

        

        // self::$model::create([
        //     "serial" => 1,
        //     "central_yearly_plan_id" => 1,
        //     "plan_title" => "দাওয়াতি কাজে উদ্বুদ্ধকরণে দায়িত্বশীলগণ পরিকল্পিতভাবে জনশক্তিদেরকে সাথে নিয়ে দাওয়াতি কাজ করবেন।",
        //     "dofa_id" => 1,
        //     "orjitobbo_target_id" => 1,
        //     "how_much_was_incomplete" => 30,
        //     "ratings" => 4.5,
        //     "is_approved" => 1,
        //     "is_public" => 'yes',
        //     "creator" => 1
        // ]);

        $completion = new CompletionModel();
        $completion->start_date = Carbon::today()->toDateString();
        $completion->end_date = Carbon::today()->addDays(90)->toDateString();
        $completion->yearly_plan_details_id = 3;
        $completion->yearly_plan_id = 1;
        $completion->save();

        $common_plan = new CommonPlan();
        $common_plan->central_plan_id = $yearly_plan->id;
        $common_plan->plan_title = $yearly_plan->plan_title;
        $common_plan->dofa_id = $yearly_plan->dofa_id;
        $common_plan->how_much_was_incomplete = $yearly_plan->how_much_was_incomplete;
        $common_plan->is_archive = 0;
        $common_plan->is_department = 0;
        $common_plan->save();
    }
}