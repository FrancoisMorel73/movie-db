<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $genres = Genre::orderBy('name', 'asc')->get();
        $movies = Movie::orderBy('release_date', 'desc')->paginate(10);

        return view('home', compact('genres', 'movies'));
    }

}
