<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;
use App\Models\User;
use App\Models\Course;
use App\Models\Role;

class RegistrationsTableSeeder extends Seeder
{
    public function run()
    {
        // Get sample users and courses
        $student = User::where('role_id', Role::where('name', 'Student')->first()->id)->first();
        $csIntroToProgramming = Course::where('name', 'Intro to Programming')->first();

        // Create a registration
        Registration::create([
            'user_id' => $student->id,
            'course_id' => $csIntroToProgramming->id,
            'registration_date' => now(),
        ]);
    }
}
