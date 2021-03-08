<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()
            ->count(1)
            ->has(
                Project::factory()->count(10)
                    ->has(
                        User::factory()->count(10), 'users'
                    ), 'projects'
            )
            ->create();
    }
}
