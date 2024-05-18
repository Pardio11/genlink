<nav x-data="{ open: false }" class="bg-gradient-to-r from-gray-950 to-gray-800 border-b border-gray-100 shadow-lg rounded-b-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('imagenes/MundonetLogo2.png') }}" alt="Logo de GenLink" class="block h-12 sm:mt-4 w-auto" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:text-3xl sm:flex">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Clientes') }}
                </x-nav-link>
                <x-nav-link href="{{ route('mis-pagos') }}" :active="request()->routeIs('Pendientes')">
                    {{ __('Pendientes') }}
                </x-nav-link>
                <x-nav-link href="{{ route('preguntas-frecuentes') }}" :active="request()->routeIs('preguntas-frecuentes')">
                    {{ __('Cajeros') }}
                </x-nav-link>
                <x-nav-link href="{{ route('provedores') }}" :active="request()->routeIs('provedores')">
                    {{ __('Provedores') }}
                </x-nav-link>
                <x-nav-link href="{{ route('reportes') }}" :active="request()->routeIs('reportes')">
                    {{ __('Salir') }}
                    <img class="h-5 w-5 ml-2" src="{{ asset('Iconos/cerrarSesion.svg') }}" alt="Cerrar sesión">
                </x-nav-link>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gradient-to-r from-gray-950 to-gray-800 border-brounded-b-lg">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('mis-pagos') }}" :active="request()->routeIs('mis-pagos')">
                {{ __('Mis pagos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('preguntas-frecuentes') }}" :active="request()->routeIs('preguntas-frecuentes')">
                {{ __('Preguntas frecuentes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('reportes') }}" :active="request()->routeIs('reportes')">
                {{ __('Reportes') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-100">{{ Auth::user()->name }}</div>
                    <div class="text-gray-300"> #737595</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
