<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Invitation::class);

        return Invitation::all();
    }

    public function store(Request $request)
    {
        $this->authorize('create', Invitation::class);

        $data = $request->validate([

        ]);

        return Invitation::create($data);
    }

    public function show(Invitation $invitation)
    {
        $this->authorize('view', $invitation);

        return $invitation;
    }

    public function update(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $data = $request->validate([

        ]);

        $invitation->update($data);

        return $invitation;
    }

    public function destroy(Invitation $invitation)
    {
        $this->authorize('delete', $invitation);

        $invitation->delete();

        return response()->json();
    }
}
