<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Show all movies or filter by genre or search order by title.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function allMovies(Request $request)
        {
            $genreName = $request->query('genre');
            $search = $request->query('search');

            $genres = Genre::orderBy('name', 'asc')->get();

            $query = Movie::query();

            if ($genreName){
                $genre = Genre::where('name', $genreName)->firstOrFail();
                $query = $genre->movies();
            }

            if ($search){
                $query->where('title', 'like', "%$search%")
                      ->orWhere('synopsis', 'like', "%$search%");
            }

            $movies = $query->orderBy('title', 'asc')->paginate(10);

            return view('movie.all', compact('genres', 'movies', 'genreName', 'search'));
        }

        /**
         * Show a detailed view of a movie.
         *
         * @param string $slug
         * @return \Illuminate\View\View
         */
        public function showMovie($slug)
        {
            $movie = Movie::where('slug', $slug)->first();
            $genres = $movie->genres;
            $seasons = $movie->seasons;
            $castings = $movie->persons()->orderBy('castings.credit_order', 'asc')->get();

            return view('movie.show', compact('movie', 'genres', 'seasons', 'castings'));
        }

}

