@extends('base')

@section('content')

<div class="container mx-auto bg-gray-100 pt-5">
    <div class="flex flex-wrap mb-2">
        <div class="w-full">
            <div class="flex flex-wrap mb-4 shadow-sm rounded-lg overflow-hidden">
                <div class="movie__poster w-full md:w-1/3 bg-cover bg-center" style="background-image: url('{{ $movie->poster }}');">
                    <img src="{{ asset('images/poster-placeholder.png') }}" class="w-full max-h-full" alt="Affiche {{ $movie->type }} : {{ $movie->title }}" >
                </div>
                <div class="movie w-full md:w-2/3 p-4 bg-white">
                    <form id="favorite-form" action="{{ route('favorites.toggle') }}" method="POST" class="favorite-form inline">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        <button type="submit" id="favorite-button-{{ $movie->id }}" class="movie__favorite text-5xl mb-2"
                            data-login-url="{{ route('auth.login') }}"
                            data-logged-in="{{ Auth::check() ? 'true' : 'false' }}">
                            @auth
                                @if (Auth::user()->favorites->contains('movie_id', $movie->id))
                                    <i id="favorite-icon-{{ $movie->id }}" class="bi bi-bookmark-x-fill text-red-500"></i>
                                @else
                                    <i id="favorite-icon-{{ $movie->id }}" class="bi bi-bookmark-plus text-red-500"></i>
                                @endif
                            @else
                                <i id="favorite-icon-{{ $movie->id }}" class="bi bi-bookmark-plus text-red-500"></i>
                            @endauth
                        </button>
                    </form>

                    <!-- Modal ou message de connexion -->
                    <div id="login-message" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
                        <div class="bg-white p-6 rounded shadow-lg">
                            <p class="text-center">Vous devez être connecté pour ajouter ce film aux favoris. <a href="{{ route('auth.login') }}" class="text-blue-500">Connectez-vous ici</a>.</p>
                            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded close-login-message">Fermer</button>
                        </div>
                    </div>

                    <strong class="text-blue-500 mb-2 block">{{ $movie->type }}</strong>
                    <h3 class="text-xl font-semibold mb-1">{{ $movie->title }}</h3>
                    <div class="text-gray-500 mb-1">{{ $movie->duration }} min</div>
                    <p>
                        @foreach ($genres as $genre)
                            <span class="inline-block bg-yellow-300 text-black rounded-full px-3 py-1 text-sm font-semibold mr-2 mb-2">{{ $genre->name }}</span>
                        @endforeach
                    </p>
                    <p class="mb-4">{{ $movie->synopsis }}</p>
                    <div class="text-yellow-500 flex items-center mt-2">
                        @php
                            $averageRating = $movie->averageRating();
                            $reviewsCount = $movie->reviewsCount();
                        @endphp
                        {!! generateStars($averageRating) !!}
                        <span class="ml-1">{{ $averageRating ? number_format($averageRating, 1) : 'N/A' }}</span>
                        <span class="text-gray-500 ml-2">({{ $reviewsCount }} avis)</span>
                    </div>
                    @if ($movie->type === "Série")
                        <h2 class="text-2xl font-bold mb-2">{{ $seasons->count() }} Saisons</h2>
                        <ul class="list-none pl-0">
                            @foreach ($seasons as $season)
                                <li class="mb-2">
                                    <span class="inline-block bg-red-500 text-white rounded-full px-3 py-1 text-sm font-semibold mr-2">Saison {{ $season->number }}</span>
                                    <small class="text-gray-500">({{ $season->episode_count }} épisodes)</small>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <dl class="mt-4">
                        <dt class="text-lg font-medium">Avec</dt>
                        @foreach ($castings as $casting)
                            <dd class="mb-2">{{ $casting->firstname }} {{ $casting->lastname }} ({{ $casting->pivot->role }})</dd>
                        @endforeach
                        <dt class="text-lg font-medium">Année</dt>
                        <dd class="mb-2">{{ \Carbon\Carbon::parse($movie->release_date)->format('Y') }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-8">
            <div class="flex flex-col lg:flex-row lg:space-x-6">
                {{-- Formulaire d'ajout d'avis --}}
                <div class="lg:w-1/2">
                    @if(Auth::check())
                        <h2 class="text-gray-500 text-center lg:text-left font-bold mb-4">Ajouter un avis :</h2>

                        <!-- Affichage des messages flash -->
                        @if(session('status'))
                        <div class="bg-green-100 text-green-700 border border-green-300 p-4 rounded-md mb-4">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form id="review-form" action="{{ route('reviews.store', $movie->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg container mx-auto">
                            @csrf
                            <div class="mb-4">
                                <label for="rating" class="block text-gray-700 font-semibold">Note</label>
                                <select name="rating" id="rating" class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-gray-800" required>
                                    <option value="" disabled selected>Choisissez une note</option>
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="content" class="block text-gray-700 font-semibold">Commentaires</label>
                                <textarea name="content" id="content" class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-gray-800" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-900 transition-colors">
                                Ajouter une critique
                            </button>
                        </form>
                    @endif
                </div>

                @php
                use Carbon\Carbon;
                @endphp

                {{-- Avis de la communauté --}}
                <div class="lg:w-1/2 mt-8 lg:mt-0">
                    <h2 class="text-gray-500 text-center lg:text-left font-bold mb-4">Avis de la communauté :</h2>
                    @foreach($movie->reviews as $review)
                        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-2">
                                <div class="flex flex-col lg:items-start mb-4 lg:mb-0">
                                    <p class="text-gray-700 font-semibold">{{ $review->user->name }}</p>
                                    <div class="flex items-center text-yellow-500">
                                        {!! generateStars($review->rating) !!}
                                        <span class="ml-2">{{ $review->rating }}/5</span>
                                    </div>
                                    <p class="text-gray-500 text-sm mt-1">Posté {{ Carbon::parse($review->published_date)->diffForHumans() }}</p>
                                </div>

                                @if(Auth::id() === $review->user_id)
                                    <div class="flex flex-col lg:flex-row space-y-2 lg:space-y-0 lg:space-x-2">
                                        <!-- Bouton Modifier -->
                                        <button
                                            type="button"
                                            class="edit-review-button bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition-colors"
                                            data-id="{{ $review->id }}"
                                            data-content="{{ $review->content }}"
                                            data-rating="{{ $review->rating }}">
                                            Modifier
                                        </button>

                                        <!-- Formulaire pour supprimer la critique -->
                                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors">Supprimer</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <p class="text-gray-600">{{ $review->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modale pour éditer une critique -->
        <div id="update-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="relative bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                <!-- Bouton de fermeture -->
                <span class="absolute top-2 right-2 text-2xl cursor-pointer text-gray-800 hover:text-red-600 transition-colors close">&times;</span>

                <!-- Formulaire de modification -->
                <form id="update-form" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-semibold">Contenu</label>
                        <textarea name="content" id="contentField" class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-gray-800" rows="5" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="rating" class="block text-gray-700 font-semibold">Note</label>
                        <select name="rating" id="ratingField" class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-gray-800" required>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-900 transition-colors w-full">
                        Enregistrer
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
