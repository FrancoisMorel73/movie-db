<div class="w-full lg:w-1/4 mb-4">
    <h2 class="text-center text-gray-500 font-bold mb-4">Les genres</h2>
    <ul class="flex flex-col items-center flex-wrap space-y-2">
        @foreach($genres as $genre)
            <li class="bg-transparent border border-red-500 text-red-500 text-center hover:bg-red-500 hover:text-white rounded w-5/6 px-4 py-2">
                <a href="{{ route('movie.all', ['genre' => $genre->name]) }}" class="block w-full h-full">
                    {{ $genre->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
