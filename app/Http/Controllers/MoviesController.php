<?php

namespace App\Http\Controllers;

use Ixudra\Curl\Facades\Curl;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upcoming($page)
    {
        // getting the results data from upcoming API 
        $upcoming = Curl::to('https://api.themoviedb.org/3/movie/upcoming?api_key=' . config('services.tmdb.key') . '&language=en-US&page=' . $page)
            ->asJson()
            ->get();

        //dump($upcoming['results']);


        foreach ($upcoming['results'] as $u) {
            echo $u['title'];
            echo '<br>';
        }
    }


    public function topRated($page)
    {
        // getting the results data from top rated API
        $topRated = Curl::to('https://api.themoviedb.org/3/movie/top_rated?api_key=' . config('services.tmdb.key') . '&language=en-US&page=' . $page)
            ->asJson()
            ->get();

        //dump($topRated['results']);

        foreach ($topRated['results'] as $t) {
            echo $t['title'];
            echo '<br>';
        }
    }

    public function movie($id)
    {
        // getting the results data from movie API 
        $movie = Curl::to('https://api.themoviedb.org/3/movie/' . $id . '?api_key=' . config('services.tmdb.key') . '&language=en-US')
            ->asJson()
            ->get();

        dump($movie);     
            echo 'ID: '.$movie['id'];
            echo '<br>';
            echo 'Movie: '.$movie['title'];
        

        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo 'Related Videos';

        // getting the results data from related videos API 
        $videos = Curl::to('https://api.themoviedb.org/3/movie/' . $id . '/videos?api_key=' . config('services.tmdb.key') . '&language=en-US')
            ->asJson()
            ->get();

        dump($videos['results']);

        foreach ($videos['results'] as $v) {
            echo $v['name'];
            echo '<br>';
        }

    }


    /* ------------ KISS - Keep it simple stupid  ------------ */
}
