<?php
namespace App\Modules\Central\yearly_plan_details;

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
        self::$model::create([
            "serial" => 1,
            "central_yearly_plan_id" => 1,
            "plan_title" => "১. প্রতিটি ওয়ার্ড ও উপশাখায় প্রতি ৩ জনে একটা দাওয়াতি গ্রুপ গঠন নিশ্চিত করা।",
            "dofa_id" => 1,
            "how_much_was_incomplete" => 30,
            "ratings" => 4.5,
            "is_approved" => 1,
            "is_public" => 'yes',
            "creator" => 1
        ]);

        $completion = new CompletionModel();
        $completion->start_date = Carbon::today()->toDateString();
        $completion->end_date = Carbon::today()->addDays(90)->toDateString();
        $completion->yearly_plan_details_id = 1;
        $completion->yearly_plan_id = 1;
        $completion->save();

        self::$model::create([
            "serial" => 1,
            "central_yearly_plan_id" => 1,
            "plan_title" => "সকল জনশক্তিকে দাওয়াতি কাজে অভ্যস্ত করতে দায়িত্বশীলগণ প্রোগ্রামসমূহে তত্ত্বাবধান করবেন। পাশাপাশি পারস্পরিক যোগাযোগের সময়ে সকল জনশক্তি ব্যক্তিগত দাওয়াতি কাজের ব্যাপারে একে অপরের খোঁজখবর নেবেন।",
            "dofa_id" => 1,
            "how_much_was_incomplete" => 30,
            "ratings" => 4.5,
            "is_approved" => 1,
            "is_public" => 'yes',
            "creator" => 1
        ]);

        $completion = new CompletionModel();
        $completion->start_date = Carbon::today()->toDateString();
        $completion->end_date = Carbon::today()->addDays(90)->toDateString();
        $completion->yearly_plan_details_id = 2;
        $completion->yearly_plan_id = 1;
        $completion->save();


        self::$model::create([
            "serial" => 1,
            "central_yearly_plan_id" => 1,
            "plan_title" => "দাওয়াতি কাজে উদ্বুদ্ধকরণে দায়িত্বশীলগণ পরিকল্পিতভাবে জনশক্তিদেরকে সাথে নিয়ে দাওয়াতি কাজ করবেন।",
            "dofa_id" => 1,
            "how_much_was_incomplete" => 30,
            "ratings" => 4.5,
            "is_approved" => 1,
            "is_public" => 'yes',
            "creator" => 1
        ]);

        $completion = new CompletionModel();
        $completion->start_date = Carbon::today()->toDateString();
        $completion->end_date = Carbon::today()->addDays(90)->toDateString();
        $completion->yearly_plan_details_id = 3;
        $completion->yearly_plan_id = 1;
        $completion->save();
    }
}