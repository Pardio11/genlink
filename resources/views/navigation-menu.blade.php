<nav x-data="{ open: false }" class="bg-zinc-900 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-around h-16">
            <div class="flex ">
                <!-- Logo -->
                <div class="logoGen  left-0">
                    <img src="{{ asset('genlinkLogo.png') }}" alt="Logo de GenLink" class="mx-auto w-28 h-16">
                </div>

                @can('cliente')
                <!-- Navigation Links -->

                <!-- Navigation Links -->
                <div class="hidden space-x-10 sm:-my-px sm:ml-28 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }} 
                    </x-nav-link>
                    <x-nav-link href="{{ route('mis-pagos') }}" :active="request()->routeIs('mis-pagos')">
                        {{ __('Mis pagos') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('preguntas-frecuentes') }}" :active="request()->routeIs('preguntas-frecuentes')">
                        {{ __('Preguntas frecuentes') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('reportes') }}" :active="request()->routeIs('reportes')">
                        {{ __('Reportes') }}
                    </x-nav-link>
                </div>
            
            @endcan
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6 flex-grow justify-end">
                <!-- Teams Dropdown -->

                <!-- Settings Dropdown -->
                <div class="ml-10 relative ">
                    <div class="flex items-center ">
                        <img class="h-9 w-9 rounded-full object-cover " src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        <x-dropdown align="right" width="50">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                                @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-400  hover:text-blue-900 focus:outline-none ">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                                @endif
                            </x-slot>
                            
                            <x-slot name="content" >
                            <!-- Account Management -->
                            @can('cliente')
                            <div class="block text-xs text-gray-500 text-center p-2">
                                {{ __('Número de cliente #') }}{{ Auth::user()->cliente->n_id }}
                            </div>                                
                            @endcan
                            
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>
                            
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                
                                <x-dropdown-link href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            </div>
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
      
      
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
                    @for ($i = 0; $i < 6; $i++)
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }} 
                        </x-nav-link>
                    @endfor

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

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
