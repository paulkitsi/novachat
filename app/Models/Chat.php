<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;

    // has many messages
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    // has many-to-many relationship with users with pivot
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('is_admin')
            ->withPivot('last_read_message_id')
            ->withTimestamps();
    }
}
