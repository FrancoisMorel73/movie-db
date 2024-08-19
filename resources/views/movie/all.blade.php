@extends('base')

@section('content')

<div class="container mx-auto bg-gray-100 p-5 border-t">

    <div class="flex flex-wrap mb-2">

        @include('partials._genres')

        <div class="w-full lg:w-3/4">

            <h2 class="text-gray-500 font-bold mb-4">
                @if($genreName)
                    Films et séries du genre {{ $genreName }}
                @elseif(request('search'))
                    Résultats de recherche pour : {{ $search }}
                @else
                    Tous les films et séries
                @endif
            </h2>

            @include('partials._movies_list')

        </div>

        {{ $movies->appends(['genre' => request('genre'), 'search' => request('search')])->links('vendor.pagination.tailwind') }}

    </div>

</div>

@endsection
