<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    public function index()
    {
        return view('actors.index', [
            'actors' => Actor::paginate(8),
        ]);
    }

    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:actors|min:2',
            'avatar' => 'nullable|image|max:2048',
            'birthday' => 'nullable|date|before:'.(date('Y') - 10).'-01-01',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = '/storage/'.$request->file('avatar')->store('actors');
        }

        Actor::create([
            'name' => $request->name,
            'avatar' => $avatar ?? null,
            'birthday' => $request->birthday,
        ]);

        return redirect('/acteurs');
    }

    public function edit(Actor $actor)
    {
        return view('actors.edit', [
            'actor' => $actor,
        ]);
    }

    public function update(Request $request, Actor $actor)
    {
        $request->validate([
            'name' => 'required|unique:actors,name,'.$actor->id.'|min:2',
            'avatar' => 'nullable|image|max:2048',
            'birthday' => 'nullable|date|before:'.(date('Y') - 10).'-01-01',
        ]);

        // Remplacer l'image s'il y en a une
        if ($request->hasFile('avatar')) {
            Storage::delete(str($actor->avatar)->remove('/storage/'));
            $avatar = '/storage/'.$request->file('avatar')->store('actors');
        }

        $actor->update([
            'name' => $request->name,
            'avatar' => $avatar ?? $actor->avatar,
            'birthday' => $request->birthday,
        ]);

        return redirect('/acteurs');
    }

    public function destroy(Actor $actor)
    {
        Storage::delete(str($actor->avatar)->remove('/storage/')); // Supprimer l'image
        $actor->delete();

        return redirect('/acteurs')->with('message', 'L\'acteur a été supprimé.');
    }
}