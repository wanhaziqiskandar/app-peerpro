<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            // SPM Level (Secondary Education Subjects)
            ['subject_name' => 'Bahasa Melayu', 'subject_level' => 'secondary'],
            ['subject_name' => 'English', 'subject_level' => 'secondary'],
            ['subject_name' => 'Mathematics', 'subject_level' => 'secondary'],
            ['subject_name' => 'Additional Mathematics', 'subject_level' => 'secondary'],
            ['subject_name' => 'Science', 'subject_level' => 'secondary'],
            ['subject_name' => 'Physics', 'subject_level' => 'secondary'],
            ['subject_name' => 'Chemistry', 'subject_level' => 'secondary'],
            ['subject_name' => 'Biology', 'subject_level' => 'secondary'],
            ['subject_name' => 'History', 'subject_level' => 'secondary'],
            ['subject_name' => 'Pendidikan Islam (Islamic Studies)', 'subject_level' => 'secondary'],

            // Pre-University Level
            ['subject_name' => 'General Studies', 'subject_level' => 'pre_u'],
            ['subject_name' => 'Mathematics (Pure or Applied)', 'subject_level' => 'pre_u'],
            ['subject_name' => 'Economics', 'subject_level' => 'pre_u'],
            ['subject_name' => 'Physics', 'subject_level' => 'pre_u'],
            ['subject_name' => 'Chemistry', 'subject_level' => 'pre_u'],
            ['subject_name' => 'Biology', 'subject_level' => 'pre_u'],
            ['subject_name' => 'Accounting', 'subject_level' => 'pre_u'],
            ['subject_name' => 'Business Studies', 'subject_level' => 'pre_u'],
            ['subject_name' => 'Psychology', 'subject_level' => 'pre_u'],
            ['subject_name' => 'Sociology', 'subject_level' => 'pre_u'],

            // Diploma Level
            ['subject_name' => 'Business Administration', 'subject_level' => 'diploma'],
            ['subject_name' => 'Hospitality Management', 'subject_level' => 'diploma'],
            ['subject_name' => 'Digital Marketing', 'subject_level' => 'diploma'],
            ['subject_name' => 'Computer Science', 'subject_level' => 'diploma'],
            ['subject_name' => 'Graphic Design', 'subject_level' => 'diploma'],
            ['subject_name' => 'Mechanical Engineering Technology', 'subject_level' => 'diploma'],
            ['subject_name' => 'Culinary Arts', 'subject_level' => 'diploma'],
            ['subject_name' => 'Early Childhood Education', 'subject_level' => 'diploma'],
            ['subject_name' => 'Event Management', 'subject_level' => 'diploma'],
            ['subject_name' => 'Electrical and Electronic Engineering', 'subject_level' => 'diploma'],

            // Degree Level
            ['subject_name' => 'Medicine (MBBS or equivalent)', 'subject_level' => 'degree'],
            ['subject_name' => 'Law', 'subject_level' => 'degree'],
            ['subject_name' => 'Civil Engineering', 'subject_level' => 'degree'],
            ['subject_name' => 'Artificial Intelligence and Data Science', 'subject_level' => 'degree'],
            ['subject_name' => 'Architecture', 'subject_level' => 'degree'],
            ['subject_name' => 'Environmental Science', 'subject_level' => 'degree'],
            ['subject_name' => 'Accounting and Finance', 'subject_level' => 'degree'],
            ['subject_name' => 'International Relations', 'subject_level' => 'degree'],
            ['subject_name' => 'Journalism and Media Studies', 'subject_level' => 'degree'],
            ['subject_name' => 'Software Engineering', 'subject_level' => 'degree'],
        ];

        DB::table('subjects')->insert($subjects);
    }
}
