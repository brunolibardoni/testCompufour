<?php

namespace App\Http\Controllers;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Curl::to('https://api.themoviedb.org/3/genre/movie/list?api_key=' . config('services.tmdb.key') . '&language=en-US')
            ->asJson()
            ->get();

        dump($genres['genres']);
    }

    public function list($id)
    {
        // getting the results data from movie API 
        $movies = Curl::to('https://api.themoviedb.org/3/movie/popular?api_key=' . config('services.tmdb.key') . '&language=en-US')
            ->asJson()
            ->get();

        $genres = Curl::to('https://api.themoviedb.org/3/genre/movie/list?api_key=' . config('services.tmdb.key') . '&language=en-US')
            ->asJson()
            ->get();

        dump($movies['results']);

        dump($genres['genres']);


        foreach ($movies['results'] as $m) {
            $ids_genre = $m['genre_ids'];
            echo (json_encode($ids_genre));
        }

        
        foreach ($genres['genres'] as $m) {
            $ids_genre = $m['id'];
            echo ($ids_genre);
        }
        
        echo '<br>';
        echo var_dump($ids_genre[0]);

    }
}
