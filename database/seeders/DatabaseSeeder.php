<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Utilisateurs
        User::factory()->create([
            'email' => 'fiorella@boxydev.com', 'name' => 'Fiorella',
        ]);
        User::factory()->create([
            'email' => 'matthieu@boxydev.com', 'name' => 'Matthieu',
        ]);

        // ------ VERSION SANS API
        // Catégories
        // Category::factory(5)->create();
        // Category::factory()->create(['name' => 'Action']);

        // Acteurs
        // Actor::factory(100)->create();

        // Films
        // Movie::factory(100)->has(Actor::factory(5))->create(function () {
            // 100 fois une catégorie aléatoire
        //     return ['category_id' => Category::all()->random()];
        // });
        // ------ VERSION SANS API

        // Les catégories sur l'API
        // https://api.themoviedb.org/3/genre/movie/list?api_key=???&language=fr
        $genres = Http::get('https://api.themoviedb.org/3/genre/movie/list', [
            'api_key' => config('services.themoviedb.key'),
            'language' => 'fr-FR',
        ])->throw()->json('genres');

        Category::factory()->createMany($genres);

        // Les films sur l'API
        $results = Http::get('https://api.themoviedb.org/3/movie/now_playing', [
            'api_key' => config('services.themoviedb.key'),
            'language' => 'fr-FR',
        ])->throw()->json('results');

        foreach ($results as $result) {
            // Détails du film (Durée, acteurs, bande annonce)
            $result = Http::get('https://api.themoviedb.org/3/movie/'.$result['id'], [
                'api_key' => config('services.themoviedb.key'),
                'language' => 'fr-FR',
                'append_to_response' => 'videos,credits',
            ])->throw()->json();

            $movie = Movie::factory()->create([
                'title' => $result['title'],
                'synopsis' => $result['overview'],
                'duration' => $result['runtime'],
                'cover' => 'https://image.tmdb.org/t/p/w400'.$result['poster_path'],
                'released_at' => $result['release_date'],
                'youtube' => $result['videos']['results'][0]['key'] ?? null,
                'category_id' => $result['genres'][0]['id'] ?? null,
                'user_id' => User::all()->random(),
            ]);

            $casts = collect($result['credits']['cast'])
                ->where('known_for_department', 'Acting')
                ->whereNotNull('profile_path')->take(5);

            foreach ($casts as $cast) {
                $cast = Http::get('https://api.themoviedb.org/3/person/'.$cast['id'], [
                    'api_key' => config('services.themoviedb.key'),
                    'language' => 'fr-FR',
                ])->throw()->json();

                // Si l'acteur n'existe pas déjà (par rapport à son id), on va le créer
                // makeOne permet de créer un objet Actor
                $actor = Actor::factory()->makeOne()->firstOrCreate(['id' => $cast['id']], [
                    'name' => $cast['name'],
                    'avatar' => 'https://image.tmdb.org/t/p/w400'.$cast['profile_path'],
                    'birthday' => $cast['birthday'],
                ]);

                $movie->actors()->attach($actor); // Lie l'acteur au film
                // $actor->movies()->attach($movie);
            }
        }
    }
}