<?php

namespace Database\Factories;

use App\Models\chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'chat_id' => Chat::factory(),
            'user_id' => User::factory(),
            'content' => $this->faker->sentence,
            'type' => 'text',
            'status' => 'sent',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
