<?php

namespace App\Http\Controllers;

use App\Models\ChatInvitation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ChatInvitationController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', ChatInvitation::class);

        return ChatInvitation::all();
    }

    public function store(Request $request)
    {
        $this->authorize('create', ChatInvitation::class);

        $data = $request->validate([

        ]);

        return ChatInvitation::create($data);
    }

    public function show(ChatInvitation $chatInvitation)
    {
        $this->authorize('view', $chatInvitation);

        return $chatInvitation;
    }

    public function update(Request $request, ChatInvitation $chatInvitation)
    {
        $this->authorize('update', $chatInvitation);

        $data = $request->validate([

        ]);

        $chatInvitation->update($data);

        return $chatInvitation;
    }

    public function destroy(ChatInvitation $chatInvitation)
    {
        $this->authorize('delete', $chatInvitation);

        $chatInvitation->delete();

        return response()->json();
    }
}
