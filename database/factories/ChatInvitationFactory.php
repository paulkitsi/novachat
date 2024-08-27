<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\ChatInvitation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ChatInvitationFactory extends Factory
{
    protected $model = ChatInvitation::class;

    public function definition()
    {
        return [
            'chat_id' => Chat::factory(),
            'user_id' => User::factory(),
            'status' => 'pending',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
