<nav class="bg-gray-800 px-4 py-2 relative">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center no-underline">
            <img src="{{ asset('images/favicon.png') }}" class="h-12 w-auto" alt="Logo Movie DB">
            <span class="text-3xl font-semibold text-red-600 ml-2">Movie DB</span>
        </a>

        <!-- Menu Toggle Button (hamburger) -->
        <button id="menu-toggle" class="text-white lg:hidden focus:outline-none">
            <i class="bi bi-list text-2xl"></i>
        </button>

        <!-- Menu (Desktop) -->
        <div id="menu" class="hidden lg:flex items-center space-x-6 ml-8">
            <ul class="flex items-center space-x-6">
                <li>
                    <a class="text-white hover:text-red-600 {{ request()->routeIs('home') ? 'font-bold' : '' }}" href="{{ route('home') }}">
                        Accueil
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-red-600 {{ request()->routeIs('movie.all') ? 'font-bold' : '' }}" href="{{ route('movie.all') }}">
                        <i class="bi bi-film"></i> Films, Séries TV
                    </a>
                </li>
                <li>
                    <a class="text-white hover:text-red-600 {{ request()->routeIs('movie.favorites') ? 'font-bold' : '' }}" href="{{ route('movie.favorites') }}">
                        <i class="bi bi-bookmark"></i> Ma liste
                    </a>
                </li>
            </ul>

            <!-- Authentification -->
            <ul class="flex items-center space-x-6 ml-8">
                @auth
                    <li>
                        <a class="text-white hover:text-red-600" href="{{ route('profile.show') }}">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @method("delete")
                            @csrf
                            <button class="text-white hover:text-red-600" type="submit">
                                Déconnexion
                            </button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a class="text-white hover:text-red-600" href="{{ route('auth.login') }}">
                            Connexion
                        </a>
                    </li>
                @endguest
            </ul>
        </div>

        <!-- Barre de recherche (Desktop) -->
        <form class="hidden lg:flex items-center ml-auto" action="{{ route('movie.all') }}" method="GET">
            <input class="bg-gray-700 text-white rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-red-600" name="search" type="search" placeholder="Rechercher..." value="{{ request('search') }}">
            <button class="bg-transparent text-white ml-2 px-4 py-2 rounded hover:bg-red-600" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed inset-0 bg-gray-800 bg-opacity-90 p-4 hidden lg:hidden z-50">
        <div class="flex justify-end mb-4">
            <button id="menu-close" class="text-white text-2xl focus:outline-none">
                &times;
            </button>
        </div>

        <!-- Barre de recherche (Mobile) -->
        <form class="mb-4 flex justify-center items-center w-full" action="{{ route('movie.all') }}" method="GET">
            <input class="bg-gray-700 text-white rounded py-2 px-4 w-full max-w-xs focus:outline-none focus:ring-2 focus:ring-red-600" name="search" type="search" placeholder="Rechercher..." value="{{ request('search') }}">
            <button class="bg-transparent text-white rounded py-2 px-4 focus:outline-none hover:bg-red-700" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <ul class="space-y-4">
            <li class="text-center">
                <a class="text-white hover:text-red-600 {{ request()->routeIs('home') ? 'font-bold' : '' }}" href="{{ route('home') }}">
                    Accueil
                </a>
            </li>
            <li class="text-center">
                <a class="text-white hover:text-red-600 {{ request()->routeIs('movie.all') ? 'font-bold' : '' }}" href="{{ route('movie.all') }}">
                    <i class="bi bi-film"></i> Films, Séries TV
                </a>
            </li>
            <li class="text-center">
                <a class="text-white hover:text-red-600 {{ request()->routeIs('movie.favorites') ? 'font-bold' : '' }}" href="{{ route('movie.favorites') }}">
                    <i class="bi bi-bookmark"></i> Ma liste
                </a>
            </li>
        </ul>

        <!-- Authentification -->
        <ul class="space-y-4 mt-4">
            @auth
                <li class="text-center">
                    <a class="text-white hover:text-red-600" href="{{ route('profile.show') }}">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="text-center">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @method("delete")
                        @csrf
                        <button class="text-white hover:text-red-600" type="submit">
                            Déconnexion
                        </button>
                    </form>
                </li>
            @endauth
            @guest
                <li class="text-center">
                    <a class="text-white hover:text-red-600" href="{{ route('auth.login') }}">
                        Connexion
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
