@foreach($movies as $movie)
    <div class="flex flex-col md:flex-row mb-4 border rounded-lg shadow-sm bg-white overflow-hidden">
        <div class="movie__poster w-full md:w-1/3 bg-cover bg-center" style="background-image: url('{{ $movie->poster }}');">
            <img src="{{ asset('images/poster-placeholder.png') }}" alt="Affiche {{ $movie->type }} : {{ $movie->title }}">
        </div>
        <div class="movie w-full md:w-2/3 p-4 flex flex-col">
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

            <!-- Modal afficher si tentative d'ajout d'un film en favoris sans être connecté -->
            <div id="login-message" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
                <div class="bg-white p-6 rounded shadow-lg">
                    <p class="text-center">Vous devez être connecté pour ajouter ce film aux favoris. <a href="{{ route('auth.login') }}" class="text-blue-500">Connectez-vous ici</a>.</p>
                    <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded close-login-message">Fermer</button>
                </div>
            </div>

            {{-- Détail du film --}}
            <strong class="text-blue-500 text-lg mb-2">{{ $movie->type }}</strong>
            <h3 class="text-3xl font-semibold mb-1">{{ $movie->title }}</h3>
            <div class="text-gray-500 mb-1">{{ $movie->duration }} min</div>
            <p class="text-gray-700">{{ $movie->summary }}</p>
            <div class="text-yellow-500 flex items-center mt-2">
                @php
                    $averageRating = $movie->averageRating();
                    $reviewsCount = $movie->reviewsCount();
                @endphp
                {!! generateStars($averageRating) !!}
                <span class="ml-1">{{ $averageRating ? number_format($averageRating, 1) : 'N/A' }}</span>
                <span class="text-gray-500 ml-2">({{ $reviewsCount }} avis)</span>
            </div>
            <a href="{{ route('movie.show', $movie->slug) }}" class="text-5xl text-red-500 mt-3">
                <i class="bi bi-arrow-right-square"></i>
            </a>
        </div>
    </div>
@endforeach
