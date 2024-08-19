@extends('base')

@section('content')

<div class="w-full lg:w-1/2 max-w-md lg:max-w-none mx-auto bg-white rounded-lg shadow-lg p-6 my-8">
    <h2 class="text-gray-500 font-bold mb-4">
        Profil
    </h2>

    <!-- Affichage des messages de succès -->
    @if (session('status'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ session('status') }}
        </div>
    @endif

    <!-- Affichage des erreurs -->
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nom -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Adresse e-mail -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Mot de passe actuel -->
        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
            <input type="password" name="current_password" id="current_password"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Nouveau mot de passe -->
        <div class="mb-4">
            <label for="new_password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
            <input type="password" name="new_password" id="new_password"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Confirmer nouveau mot de passe -->
        <div class="mb-6">
            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le nouveau mot de passe</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Bouton de mise à jour -->
        <div class="mb-4">
            <button type="submit"
                    class="w-full bg-[#1F2937] text-white font-bold py-2 px-4 rounded-md hover:bg-opacity-90 focus:outline-none focus:bg-opacity-90">
                Mettre à jour
            </button>
        </div>
    </form>
</div>

@endsection
