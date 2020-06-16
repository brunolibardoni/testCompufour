<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;

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
        $upcoming = Curl::to('https://api.themoviedb.org/3/movie/upcoming?api_key='.config('services.tmdb.key').'&language=en-US&page='.$page)
            ->asJson()
            ->get();
        
        dump($upcoming['results']);
    }


    public function topRated($page)
    {
        // getting the results data from top rated API 
        $upcoming = Curl::to('https://api.themoviedb.org/3/movie/top_rated?api_key='.config('services.tmdb.key').'&language=en-US&page='.$page)
            ->asJson()
            ->get();
        
        dump($upcoming['results']);

    }

}
