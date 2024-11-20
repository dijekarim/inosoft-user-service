<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        for ($i = 1; $i <= 5; $i++) {
            Department::create([
                'name' => 'Department ' . $i,
                'max_quota' => 100,
                'start_reg' => Date('2024-12-01'),
                'end_reg' => Date('2024-12-31'),
                'min_math_grade' => 80.00,
                'min_science_grade' => 80.00,
            ]);
        }
    }
}
