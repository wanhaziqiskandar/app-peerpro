<?php

namespace Database\Seeders;

use App\Models\ChatConversation;
use App\Models\ChatMessage;
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
        $this->seedUsers();
        // TuitionRequest::factory(10)->create();
        // TuitionPayment::factory(10)->create();
        // TuitionTimeslot::factory(10)->create();
        $this->seedMessages(2);
    }

    public function seedUsers()
    {
        $this->command->info("Seeding users...");

        User::factory()->create([
            'email' => 'tutor@demo.com',
            'name' => 'Demo Tutor',
            'role' => 'tutor',
        ]);
        User::factory()->create([
            'email' => 'tutee@demo.com',
            'name' => 'Demo Tutee',
            'role' => 'tutee',
        ]);
        User::factory(10)->create([
            'role' => 'tutor',
        ]);
        User::factory(10)->create([
            'role' => 'tutee',
        ]);
    }

    public function seedMessages($count_per_user)
    {
        $this->command->info("Seeding $count_per_user messages per user...");

        $users = User::all();

        $user = $users->first();
        $other_users = $users->except($user->id);

        foreach ($other_users as $other_user) {
            $chat_conversation = ChatConversation::factory()->create();
            $chat_conversation->users()->attach([$user->id, $other_user->id]);

            ChatMessage::factory($count_per_user)->create([
                'chat_conversation_id' => $chat_conversation->id,
                'author_id' => $user->id,
            ]);

            ChatMessage::factory($count_per_user)->create([
                'chat_conversation_id' => $chat_conversation->id,
                'author_id' => $other_user->id,
            ]);
        }
    }
}
