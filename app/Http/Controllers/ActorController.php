<?php

namespace App\Http\Controllers;

use App\Models\Actor;

class ActorController extends Controller
{
    public function index()
    {
        return view('actors.index', [
            'actors' => Actor::paginate(10),
        ]);
    }

    public function show(string $actor)
    {
        $actor = Actor::findOrFail($actor); // Select * from actors where actor = :actor

        return view('actors.show', ['actor' => $actor]);
    }

}
