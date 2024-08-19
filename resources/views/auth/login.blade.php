@extends('base')

@section('content')

<div class="w-full lg:w-1/2 max-w-md lg:max-w-none mx-auto bg-white rounded-lg shadow-lg p-6 my-8">
    <h2 class="text-gray-500 font-bold mb-4">
        Connexion
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

    <form action="{{ route('auth.login') }}" method="POST">
        @csrf

        <!-- Adresse e-mail -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                   class="mt-1 block w-full px-3 py-2 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Mot de passe -->
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" name="password" id="password" required
                   class="mt-1 block w-full px-3 py-2 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Se souvenir de moi -->
        <div class="flex items-center mb-6">
            <input type="checkbox" name="remember" id="remember"
                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="remember" class="ml-2 block text-sm text-gray-900">
                Se souvenir de moi
            </label>
        </div>

        <!-- Bouton de connexion -->
        <div class="mb-4">
            <button type="submit"
                    class="w-full bg-[#1F2937] text-white font-bold py-2 px-4 rounded-md hover:bg-opacity-90 focus:outline-none focus:bg-opacity-90">
                Se connecter
            </button>
        </div>

        <!-- Lien mot de passe oublié -->
        <div class="text-center mb-4">
            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Mot de passe oublié ?</a>
        </div>

        <!-- Lien d'inscription -->
        <div class="text-center">
            <span class="text-sm text-gray-600">Pas de compte ?</span>
            <a href="{{ route('register') }}" class="text-sm text-indigo-600 hover:text-indigo-500">S'inscrire</a>
        </div>
    </form>
</div>

@endsection
