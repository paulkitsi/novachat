<?php

namespace App\Policies;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvitationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Invitation $invitation)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Invitation $invitation)
    {
    }

    public function delete(User $user, Invitation $invitation)
    {
    }

    public function restore(User $user, Invitation $invitation)
    {
    }

    public function forceDelete(User $user, Invitation $invitation)
    {
    }
}
