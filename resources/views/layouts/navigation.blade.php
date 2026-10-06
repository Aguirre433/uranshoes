<nav x-data="{ open: false }" class="bg-[#1E56A0] text-white shadow-md border-b border-blue-900">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Logo + Navigation -->
            <div class="flex items-center gap-8">

                <!-- Logo & Brand Badge -->
                <div class="shrink-0 flex items-center gap-3">
                    <span class="bg-amber-500 text-slate-900 text-[10px] font-extrabold uppercase px-2 py-0.5 rounded tracking-wider shadow-sm">
                        ADMIN
                    </span>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-white font-extrabold tracking-wider text-xl hover:opacity-90 transition">
                        URBAN<span class="text-blue-200">SHOES</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:flex items-center h-full">

                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-blue-800/80 text-white font-semibold' : 'text-blue-100 hover:bg-blue-700/60 hover:text-white' }}">
                        Dashboard
                    </a>


                    <!-- Usuarios y Roles -->
                    @hasanyrole('Administrador|Supervisor')
                        <a href="{{ route('users.index') }}" 
                           class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium transition {{ request()->routeIs('users.*') ? 'bg-blue-800/80 text-white font-semibold' : 'text-blue-100 hover:bg-blue-700/60 hover:text-white' }}">
                            Usuarios
                        </a>
                    @endhasanyrole

                    <!-- Guía Técnica -->
                    <a href="{{ route('tutorial') }}" 
                       class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium transition {{ request()->routeIs('tutorial') ? 'bg-blue-800/80 text-white font-semibold' : 'text-blue-100 hover:bg-blue-700/60 hover:text-white' }}">
                        Guía
                    </a>

                </div>
            </div>

            <!-- Right Navbar Status & Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:gap-4 sm:ms-6">

                <!-- Action / External Links -->
                <a href="{{ url('/') }}" target="_blank" class="text-xs font-semibold text-blue-200 hover:text-white transition flex items-center gap-1">
                    Ver Tienda <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                </a>

                <!-- Status Badge -->
                <div class="flex items-center gap-1.5 text-xs text-emerald-300 bg-blue-900/50 px-2.5 py-1 rounded-full border border-blue-700/50">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Panel Activo</span>
                </div>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-medium rounded-lg text-white bg-blue-800/60 hover:bg-blue-800 transition focus:outline-none border border-blue-700/50">
                            <!-- Avatar Circle -->
                            <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold text-white">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <span>{{ Auth::user()->name }}</span>

                            <svg class="fill-current h-4 w-4 text-blue-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <!-- Dropdown Content -->
                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-slate-100 bg-slate-50">
                            <p class="text-sm font-bold text-slate-800">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-xs text-slate-500 truncate mt-0.5">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                        <!-- Perfil -->
                        <x-dropdown-link :href="route('profile.edit')" class="text-slate-700 hover:bg-blue-50 hover:text-[#1E56A0]">
                            👤 Perfil
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-red-600 hover:bg-red-50">
                                🚪 Cerrar sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-100 hover:text-white hover:bg-blue-800 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>

    </div>

    <!-- Mobile Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-blue-900 border-t border-blue-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-blue-800">
                Dashboard
            </x-responsive-nav-link>
            @hasanyrole('Administrador|Supervisor')
                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')" class="text-white hover:bg-blue-800">
                    Usuarios
                </x-responsive-nav-link>
            @endhasanyrole
            <x-responsive-nav-link :href="route('tutorial')" :active="request()->routeIs('tutorial')" class="text-white hover:bg-blue-800">
                Guía Técnica
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-3 border-t border-blue-800 bg-blue-950 px-4">
            <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-blue-300">{{ Auth::user()->email }}</div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-blue-100 hover:bg-blue-800">
                    Perfil
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-300 hover:bg-blue-800">
                        Cerrar sesión
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

</nav>