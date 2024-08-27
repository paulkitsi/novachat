<?php

namespace App\Policies;

use App\Models\ChatInvitation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatInvitationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, ChatInvitation $chatInvitation)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, ChatInvitation $chatInvitation)
    {
    }

    public function delete(User $user, ChatInvitation $chatInvitation)
    {
    }

    public function restore(User $user, ChatInvitation $chatInvitation)
    {
    }

    public function forceDelete(User $user, ChatInvitation $chatInvitation)
    {
    }
}
