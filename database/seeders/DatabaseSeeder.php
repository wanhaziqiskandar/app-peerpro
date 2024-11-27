<?php

namespace Database\Seeders;

use App\Models\TuitionAssessment;
use App\Models\TuitionPayment;
use App\Models\TuitionRequest;
use App\Models\TuitionTimeslot;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->create([
            'role' => 'tutee',
            'password' => bcrypt('tutee123'),
        ]);

        User::factory(10)->create([
            'role' => 'tutor',
            'password' => bcrypt('tutor123'),
        ]);

        TuitionRequest::factory(10)->create();
        TuitionAssessment::factory(10)->create();
        TuitionPayment::factory(10)->create();
        TuitionTimeslot::factory(10)->create();
    }
}
