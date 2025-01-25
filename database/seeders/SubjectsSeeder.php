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

            // Diploma Level (Expanded)
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
            ['subject_name' => 'Construction Management', 'subject_level' => 'diploma'],
            ['subject_name' => 'Logistics and Supply Chain Management', 'subject_level' => 'diploma'],
            ['subject_name' => 'Accounting and Finance', 'subject_level' => 'diploma'],
            ['subject_name' => 'Information Technology', 'subject_level' => 'diploma'],
            ['subject_name' => 'Public Relations', 'subject_level' => 'diploma'],

            // Degree Level (Expanded)
            ['subject_name' => 'Medicine (MBBS or equivalent)', 'subject_level' => 'degree'],
            ['subject_name' => 'Law', 'subject_level' => 'degree'],
            ['subject_name' => 'Civil Engineering', 'subject_level' => 'degree'],

            // Software Engineering
            ['subject_name' => 'Software Engineering (Core)', 'subject_level' => 'degree'],
            ['subject_name' => 'Data Structures and Algorithms', 'subject_level' => 'degree'],
            ['subject_name' => 'Object-Oriented Programming (OOP)', 'subject_level' => 'degree'],
            ['subject_name' => 'Web Development (Frontend)', 'subject_level' => 'degree'],
            ['subject_name' => 'Web Development (Backend)', 'subject_level' => 'degree'],
            ['subject_name' => 'Mobile Application Development', 'subject_level' => 'degree'],
            ['subject_name' => 'Database Management Systems', 'subject_level' => 'degree'],
            ['subject_name' => 'Software Testing and Quality Assurance', 'subject_level' => 'degree'],
            ['subject_name' => 'Artificial Intelligence', 'subject_level' => 'degree'],
            ['subject_name' => 'Machine Learning', 'subject_level' => 'degree'],
            ['subject_name' => 'Software Project Management', 'subject_level' => 'degree'],
            ['subject_name' => 'Programming Languages (Python, Java, C++)', 'subject_level' => 'degree'],

            // Engineering Subjects
            ['subject_name' => 'Engineering Mathematics (Calculus)', 'subject_level' => 'degree'],
            ['subject_name' => 'Engineering Physics', 'subject_level' => 'degree'],
            ['subject_name' => 'Engineering Chemistry', 'subject_level' => 'degree'],
            ['subject_name' => 'Thermodynamics', 'subject_level' => 'degree'],
            ['subject_name' => 'Fluid Mechanics', 'subject_level' => 'degree'],
            ['subject_name' => 'Heat Transfer', 'subject_level' => 'degree'],
            ['subject_name' => 'Statics and Dynamics', 'subject_level' => 'degree'],
            ['subject_name' => 'Materials Science', 'subject_level' => 'degree'],
            ['subject_name' => 'Control Systems', 'subject_level' => 'degree'],
            ['subject_name' => 'Electrical Circuits', 'subject_level' => 'degree'],
            ['subject_name' => 'Mechanical Design', 'subject_level' => 'degree'],
            ['subject_name' => 'Structural Analysis', 'subject_level' => 'degree'],
            ['subject_name' => 'Engineering Ethics', 'subject_level' => 'degree'],
            ['subject_name' => 'Environmental Engineering', 'subject_level' => 'degree'],
            ['subject_name' => 'Project Management for Engineers', 'subject_level' => 'degree'],
            ['subject_name' => 'Engineering Mathematics (Linear Algebra)', 'subject_level' => 'degree'],
            ['subject_name' => 'Robotics', 'subject_level' => 'degree'],

            // Additional Degree Subjects
            ['subject_name' => 'Architecture', 'subject_level' => 'degree'],
            ['subject_name' => 'Environmental Science', 'subject_level' => 'degree'],
            ['subject_name' => 'Accounting and Finance', 'subject_level' => 'degree'],
            ['subject_name' => 'International Relations', 'subject_level' => 'degree'],
            ['subject_name' => 'Journalism and Media Studies', 'subject_level' => 'degree'],
            ['subject_name' => 'Electrical Engineering', 'subject_level' => 'degree'],
            ['subject_name' => 'Mechanical Engineering', 'subject_level' => 'degree'],
            ['subject_name' => 'Psychology', 'subject_level' => 'degree'],
            ['subject_name' => 'Cybersecurity', 'subject_level' => 'degree'],
            ['subject_name' => 'Biotechnology', 'subject_level' => 'degree'],
            ['subject_name' => 'Marketing Management', 'subject_level' => 'degree'],
            ['subject_name' => 'Finance', 'subject_level' => 'degree'],
            ['subject_name' => 'Business Analytics', 'subject_level' => 'degree'],
            ['subject_name' => 'Sociology and Anthropology', 'subject_level' => 'degree'],
            ['subject_name' => 'Linguistics', 'subject_level' => 'degree'],
            ['subject_name' => 'Creative Writing', 'subject_level' => 'degree'],
            ['subject_name' => 'Digital Media', 'subject_level' => 'degree'],
            ['subject_name' => 'Game Development', 'subject_level' => 'degree'],
        ];

        DB::table('subjects')->insert($subjects);
    }
}
