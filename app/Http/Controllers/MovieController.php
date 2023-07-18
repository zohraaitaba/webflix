<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index', [
            'movies' => Movie::paginate(10),
        ]);
    }

    public function show(string $id)
    {
        $movie = Movie::findOrFail($id); // Select * from movie where id = :id

        return view('movies.show', ['movie' => $movie]);
    }

    public function create()
    {
        return view('movies.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies|min:2',
            'synopsis' => 'required|min:10',
            'duration' => 'required|integer|min:1',
            'youtube' => 'nullable|string',
            'cover' => 'required|image|max:2048',
            'released_at' => 'nullable|date',
            'category' => 'required|exists:categories,id',
        ]);

        /* $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->synopsis = $request->input('synopsis');
        $movie->duration = $request->input('duration');
        $movie->youtube = $request->input('youtube');
        $movie->released_at = $request->input('released_at');
        $movie->category_id = $request->input('category');
        $movie->save(); */

        Movie::create([
            'title' => $request->title,
            'synopsis' => $request->synopsis,
            'duration' => $request->duration,
            'youtube' => $request->youtube,
            'cover' =>'/storage/'. $request->file('cover')->store('movies'),
            'released_at' => $request->released_at,
            'category_id' => $request->category,
            'user_id' => $request->user()->id,
        ]);

        return redirect('/films');
    }


    public function edit(Movie $movie)
    {
        return view('movies.edit', [
            'categories' => Category::all(),
            'movie'=> $movie,
        ]);
    }

    public function destroy(Request $request,string $id)
    {
        /* on s'assure que l'utisateur est bien le propriétaire du film */
        $movie= Movie::findOrFail($id);
        Gate::allowIf($movie->user_id=== $request->user()->id);

      Movie::destroy($id);
      return redirect('/films')->with('success', 'Le film a été supprimé.');
    }
}