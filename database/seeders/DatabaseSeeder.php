<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        //Category::factory(5)->create();
        //Category::factory()->create(['name'=> 'Action']);

        //Les catégories dans l'API
        //https://api.themoviedb.org/3/genre/movie/list?api_key=???&language=fr

        $genres = Http::get('https://api.themoviedb.org/3/genre/movie/list', [
            'api_key' => config('services.themoviedb.key'),
            'language' => 'fr-FR',
        ])->throw()->json('genres');

        //dd($genres);

        Category::factory()->createMany($genres);


        //Les films dans l'API
        $results = Http::get('https://api.themoviedb.org/3/movie/now_playing', [
            'api_key' => config('services.themoviedb.key'),
            'language' => 'fr-FR',
        ])->throw()->json('results');
        //dd($results);

        foreach ($results as $result) {
            //détails du film (Durée, acteurs,bande annonce)
            $result = Http::get('https://api.themoviedb.org/3/movie/'.$result['id'], [
                'api_key' => config('services.themoviedb.key'),
                'language' => 'fr-FR',
                'append_to_response'=> 'videos',
            ])->throw()->json();
            dump($result);

            Movie::factory()->create([
                'title'=> $result['title'],
                'synopsis'=> $result['overview'],
                'duration'=> $result['runtime'],
                'cover'=> 'https://image.tmdb.org/t/p/w400'.$result['poster_path'],
                'released_at'=> $result['release_date'],
                'youtube'=> $result['videos']['results'][0]['key']??null,
                'category_id'=> $result['genres'][0]['id']?? null,
            ]);
        }

        /* Movie::factory(100)->create(function(){
            //100 fois une catégorie aléatoire
            return ['category_id'=> Category::all()->random()];
        }); */
    }
}
