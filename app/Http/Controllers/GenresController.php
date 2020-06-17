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


        foreach($genres['genres'] as $g){
            echo $g['name'];
            echo '<br>';
        }
    }

    public function list($id)
    {
        // getting the results data from popular movie API 
        $movies = Curl::to('https://api.themoviedb.org/3/movie/popular?api_key=' . config('services.tmdb.key') . '&language=en-US')
            ->asJson()
            ->get();

        //dump($movies['results']);

        echo 'Filmes atrelados a este Gênero';
        echo '<br>';
        echo '<br>';
        foreach($movies['results'] as $m){
            if (in_array($id,$m['genre_ids'])){
                echo $m['title'];
                echo '<br>';
            }
        }

    }
}
