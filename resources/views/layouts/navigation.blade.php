<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-800 to-indigo-700 border-b border-indigo-500 shadow-lg text-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block w-auto text-white h-10" />
                </a>
            </div>

            <!-- Links (Logged In) -->
            @auth
                @can('create', App\Models\Vacante::class)
                    <div class="hidden space-x-6 sm:flex ml-10">
                        <x-nav-link :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')" class="text-white hover:text-yellow-300 font-semibold transition duration-300">
                            {{ __('Mis Vacantes') }}
                        </x-nav-link>
                        <x-nav-link :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')" class="text-white hover:text-yellow-300 font-semibold transition duration-300">
                            {{ __('Crear Vacante') }}
                        </x-nav-link>
                    </div>
                @endcan
            @endauth

            <!-- Notificaciones y Usuario -->
            <div class="hidden sm:flex items-center space-x-4">
                @auth
                    @if (auth()->user()->rol == 2)
                        <a href="{{ route('notificaciones') }}" class="relative">
                            <span class="absolute -top-2 -right-2 text-xs font-bold bg-red-500 rounded-full w-6 h-6 flex items-center justify-center">
                                {{ Auth::user()->unreadNotifications->count() }}
                            </span>
                            <svg class="w-6 h-6 text-white hover:text-yellow-300 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 17h5l-1.405-1.405C18.79 14.79 18 13.42 18 12V9c0-3.07-1.63-5.64-4.5-6.32V2a1.5 1.5 0 00-3 0v.68C7.63 3.36 6 5.92 6 9v3c0 1.42-.79 2.79-2.595 3.595L2 17h5m8 0v1a3 3 0 11-6 0v-1h6z"/>
                            </svg>
                        </a>
                    @endif

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center px-3 py-2 text-sm font-medium rounded-md hover:bg-indigo-600 focus:outline-none transition">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0L5.293 8.707a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <div class="space-x-4">
                        <x-nav-link :href="route('login')" class="text-white hover:text-yellow-300 font-semibold transition">
                            {{ __('Iniciar Sesión') }}
                        </x-nav-link>
                        <x-nav-link :href="route('register')" class="text-white hover:text-yellow-300 font-semibold transition">
                            {{ __('Crear Cuenta') }}
                        </x-nav-link>
                    </div>
                @endguest
            </div>

            <!-- Mobile Menu Button -->
            <div class="sm:hidden">
                <button @click="open = !open" class="text-white hover:text-yellow-300 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden bg-indigo-800 text-white">
        @auth
            <div class="pt-4 pb-3 space-y-2 px-4">
                <x-responsive-nav-link :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')" class="hover:text-yellow-300">
                    {{ __('Mis Vacantes') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')" class="hover:text-yellow-300">
                    {{ __('Crear Vacante') }}
                </x-responsive-nav-link>
                @if (auth()->user()->rol == 2)
                    <x-responsive-nav-link :href="route('notificaciones')" class="flex items-center justify-between">
                        <span>Notificaciones</span>
                        <span class="bg-red-500 text-white rounded-full w-6 h-6 text-center text-sm font-bold">{{ Auth::user()->unreadNotifications->count() }}</span>
                    </x-responsive-nav-link>
                @endif
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        @endauth

        @guest
            <div class="pt-4 pb-3 px-4 space-y-2">
                <x-responsive-nav-link :href="route('login')" class="hover:text-yellow-300">
                    {{ __('Iniciar Sesión') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" class="hover:text-yellow-300">
                    {{ __('Crear Cuenta') }}
                </x-responsive-nav-link>
            </div>
        @endguest
    </div>
</nav>
