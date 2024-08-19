@extends('base')

@section('content')

<div class="container mx-auto bg-gray-100 p-5 border-t border-gray-300">

    <div class="mb-4">
        <h2 class="text-gray-500 font-bold mb-4">Mes favoris</h2>
    </div>

    @if ($favorites->isEmpty())
        <p>Aucun film dans vos favoris.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($favorites as $favorite)
            <div class="bg-white rounded-lg shadow-md flex flex-row overflow-hidden relative">
                <div class="movie__poster w-2/5 xl:w-1/4 h-64" style="background-image: url('{{ $favorite->movie->poster }}');">
                    <img src="{{ asset('images/poster-placeholder.png') }}" alt="{{ $favorite->movie->title }}">
                </div>
                <div class="w-3/5 xl:w-3/4 p-4">
                    <strong class="block mb-2 text-blue-500 text-sm">{{ $favorite->movie->type }}</strong>
                    <h3 class="text-xl font-semibold mb-2">{{ $favorite->movie->title }}</h3>
                    <div class="text-gray-600 mb-2">{{ $favorite->movie->duration }} min</div>
                    <a href="{{ route('movie.show', ['slug' => $favorite->movie->slug]) }}" class="text-red-500 text-2xl">
                        <i class="bi bi-arrow-right-square"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @endif

</div>

@endsection
