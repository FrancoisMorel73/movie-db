@extends('base')

@section('content')

<div class="w-full lg:w-1/2 max-w-md lg:max-w-none mx-auto bg-white rounded-lg shadow-lg p-6 my-8">
    <h2 class="text-gray-500 font-bold mb-4">
        Réinitialiser le mot de passe
    </h2>

    <!-- Affichage des messages de succès -->
    @if (session('status'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ session('status') }}
        </div>
    @endif

    <!-- Affichage des erreurs -->
    @error('email')
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @enderror

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <!-- Adresse e-mail -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Bouton pour demander un lien de réinitialisation -->
        <div class="mb-4">
            <button type="submit"
                    class="w-full bg-[#1F2937] text-white font-bold py-2 px-4 rounded-md hover:bg-opacity-90 focus:outline-none focus:bg-opacity-90">
                Envoyer le lien de réinitialisation
            </button>
        </div>

        <!-- Lien de retour à la connexion -->
        <div class="text-center">
            <a href="{{ route('auth.login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Retour à la connexion</a>
        </div>
    </form>
</div>

@endsection
