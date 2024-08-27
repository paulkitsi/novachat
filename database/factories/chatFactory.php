<?php

namespace Database\Factories;

use App\Models\chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class chatFactory extends Factory
{
    protected $model = chat::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'user_id' => User::factory(),
            'is_group_chat' => $this->faker->boolean,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
