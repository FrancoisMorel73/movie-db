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
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <!-- Token -->
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Adresse e-mail -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input type="email" name="email" id="email" required value="{{ old('email', $email) }}"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Nouveau mot de passe -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
            <input type="password" name="password" id="password" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Confirmation du mot de passe -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Bouton pour réinitialiser le mot de passe -->
        <div class="mb-4">
            <button type="submit"
                    class="w-full bg-[#1F2937] text-white font-bold py-2 px-4 rounded-md hover:bg-opacity-90 focus:outline-none focus:bg-opacity-90">
                Réinitialiser le mot de passe
            </button>
        </div>
    </form>
</div>

@endsection
