<?php

namespace App\Policies;

use App\Models\chat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class chatPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, chat $chat)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, chat $chat)
    {
    }

    public function delete(User $user, chat $chat)
    {
    }

    public function restore(User $user, chat $chat)
    {
    }

    public function forceDelete(User $user, chat $chat)
    {
    }
}
