@extends('base')

@section('content')

<div class="w-full lg:w-1/2 max-w-md lg:max-w-none mx-auto bg-white rounded-lg shadow-lg p-6 my-8">
    <h2 class="text-gray-500 font-bold mb-4">
        Inscription
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

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Nom -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="name" id="name" required value="{{ old('name') }}"
                   class="mt-1 block w-full px-3 py-2 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Adresse e-mail -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                   class="mt-1 block w-full px-3 py-2 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Mot de passe -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" name="password" id="password" required
                   class="mt-1 block w-full px-3 py-2 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Confirmation du mot de passe -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmez le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   class="mt-1 block w-full px-3 py-2 border {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Bouton d'inscription -->
        <div class="mb-4">
            <button type="submit"
                    class="w-full bg-[#1F2937] text-white font-bold py-2 px-4 rounded-md hover:bg-opacity-90 focus:outline-none focus:bg-opacity-90">
                S'inscrire
            </button>
        </div>

        <!-- Lien de connexion -->
        <div class="text-center">
            <span class="text-sm text-gray-600">Déjà un compte ?</span>
            <a href="{{ route('auth.login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Se connecter</a>
        </div>
    </form>
</div>

@endsection
