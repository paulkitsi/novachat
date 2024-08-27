<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
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

        $mike = User::factory()->create([
            'name' => 'Mike Kings',
            'email' => 'mike@example.com',
        ]);

        $paul = User::factory()->create([
            'name' => 'Paul Kitsi',
            'email' => 'paul@example.com',
        ]);

        $chat = Chat::factory()->create([
            'name' => 'Laravel Chat',
            'user_id' => $paul->id,
        ]);

        $chat->users()->attach($paul->id, ['is_admin' => true]);
        $chat->users()->attach($mike->id, ['is_admin' => false]);

        //create many messages between mike and paul
        Message::factory(10)->create([
            'chat_id' => $chat->id,
            'user_id' => $mike->id,
        ]);

        Message::factory(10)->create([
            'chat_id' => $chat->id,
            'user_id' => $paul->id,
        ]);
    }
}
