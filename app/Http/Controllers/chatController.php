<?php

namespace App\Http\Controllers;

use App\Models\chat;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class chatController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', chat::class);

        return chat::all();
    }

    public function store(Request $request)
    {
        $this->authorize('create', chat::class);

        $data = $request->validate([

        ]);

        return chat::create($data);
    }

    public function show(chat $chat)
    {
        $this->authorize('view', $chat);

        return $chat;
    }

    public function update(Request $request, chat $chat)
    {
        $this->authorize('update', $chat);

        $data = $request->validate([

        ]);

        $chat->update($data);

        return $chat;
    }

    public function destroy(chat $chat)
    {
        $this->authorize('delete', $chat);

        $chat->delete();

        return response()->json();
    }
}
