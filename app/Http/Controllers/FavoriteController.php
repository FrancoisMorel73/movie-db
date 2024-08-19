<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class FavoriteController extends Controller
{
    /**
     * Toggle the movie in the favorites list.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function toggle(Request $request) : JsonResponse
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Vous devez être connecté pour ajouter des favoris.'
            ], 403); // Code de statut HTTP pour l'interdiction
        }

        $user = Auth::user();
        $movieId = $request->input('movie_id');

        $favorite = Favorite::where('user_id', $user->id)
                            ->where('movie_id', $movieId)
                            ->first();

        if ($favorite) {
            $favorite->delete();
            $isFavorited = false;
            $message = 'Favori retiré avec succès !';
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'movie_id' => $movieId,
            ]);
            $isFavorited = true;
            $message = 'Favori ajouté avec succès !';
        }

        return response()->json([
            'success' => true,
            'isFavorited' => $isFavorited,
            'message' => $message
        ]);
    }

    /**
     * Show the favorites list.
     *
     * @return View|RedirectResponse
     */
    public function showFavorites() : View | RedirectResponse
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login')->withErrors(['message' => 'Vous devez être connecté pour accéder à vos favoris.']);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $favorites = $user->favorites()->with('movie')->get();
        return view('movie.favorites', ['favorites' => $favorites]);
    }
}
