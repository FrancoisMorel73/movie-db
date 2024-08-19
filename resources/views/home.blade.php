@extends('base')

@section('content')

<div class="my-5 py-5 text-center">
    <img src="{{ asset('images/favicon.png') }}" alt="Logo O'flix" class="mb-3 h-24 mx-auto">
    <h1 class="text-4xl font-extrabold mb-4">Films, séries TV et popcorn en illimité.</h1>
    <div class="w-full max-w-lg mx-auto">
        <p class="text-xl text-gray-500 mb-4">Où que vous soyez. Gratuit pour toujours.</p>
    </div>
</div>

<div class="container mx-auto bg-gray-100 p-5 border-t">

    <div class="flex flex-wrap mb-2">

        @include('partials._genres')

        <div class="w-full lg:w-3/4">

            <h2 class="text-gray-500 font-bold mb-4">Les nouveautés</h2>

            @include('partials._movies_list')

        </div>

        {{ $movies->links('vendor.pagination.tailwind') }}

    </div>

</div>

@endsection
