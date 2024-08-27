<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    // has many messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // has many to many relationship with users with pivot
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('is_admin')
            ->withPivot('last_read_message_id')
            ->withTimestamps();
    }
}
