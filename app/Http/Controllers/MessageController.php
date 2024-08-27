<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Message::class);

        return Message::all();
    }

    public function store(Request $request, Chat $chat)
    {
        $this->authorize('create', Message::class);

        $data = $request->validate([
            'content' => ['required', 'string'],
        ]);

        $chat->messages()->create([...$data, 'user_id' => auth()->id()]);

        return back();
    }

    public function show(Message $message)
    {
        $this->authorize('view', $message);

        return $message;
    }

    public function update(Request $request, Message $message)
    {
        $this->authorize('update', $message);

        $data = $request->validate([

        ]);

        $message->update($data);

        return $message;
    }

    public function destroy(Message $message)
    {
        $this->authorize('delete', $message);

        $message->delete();

        return response()->json();
    }
}
