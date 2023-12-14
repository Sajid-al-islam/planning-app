<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Modules\Central\yearly_plan\Seeder as Yearly_planSeeder;
use App\Modules\Central\yearly_plan_complete_by_divisions\Seeder as Yearly_plan_complete_by_divisionsSeeder;
use App\Modules\Central\yearly_plan_details\Seeder as Yearly_plan_detailsSeeder;
use App\Modules\Central\yearly_plan_orjitobbo_targets\Seeder as Yearly_plan_orjitobbo_targetsSeeder;
use App\Modules\Central\yearly_plan_suggestions\Seeder as Yearly_plan_suggestionsSeeder;
use App\Modules\Department\Department_plan\Seeder as Department_planSeeder;
use App\Modules\Department\Seeder as DepartmentSeeder;
use App\Modules\Dofa\Seeder as DofaSeeder;
use App\Modules\Responsibles\Seeder as ResponsiblesSeeder;
use App\Modules\User\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            Yearly_planSeeder::class,
            UserSeeder::class,
            Yearly_plan_detailsSeeder::class,
            DofaSeeder::class,
            Yearly_plan_orjitobbo_targetsSeeder::class,
            Yearly_plan_suggestionsSeeder::class,
            ResponsiblesSeeder::class,
            Yearly_plan_complete_by_divisionsSeeder::class,
            Department_planSeeder::class
        ]);
    }
}
