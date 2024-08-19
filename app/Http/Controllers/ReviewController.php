<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReviewController extends Controller
{
    use AuthorizesRequests;

    /**
     * Add a review to a movie.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $movie = Movie::findOrFail($id);

        Review::create([
            'user_id' => Auth::id(),
            'movie_id' => $movie->id,
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
            'published_date' => now(),
        ]);

        return redirect()->route('movie.show', ['slug' => $movie->slug])
                         ->with('status', 'Avis ajouté avec succès !');
    }

    /**
     * Show the form to edit our reviews.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $this->authorize('update', $review);

        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $review->content = $request->input('content');
        $review->rating = $request->input('rating');
        $review->save();

        $movieSlug = $review->movie->slug;

        return redirect()->route('movie.show', ['slug' => $movieSlug])->with('status', 'Avis mis à jour avec succès !');
    }

    /**
     * Delete our reviews.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $this->authorize('delete', $review);

        $movieSlug = $review->movie->slug;

        $review->delete();

        return redirect()->route('movie.show', ['slug' => $movieSlug])->with('status', 'Avis supprimé avec succès !');
    }
}
