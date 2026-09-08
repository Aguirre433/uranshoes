<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Logo + Navigation -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <span class="text-2xl">👟</span>

                        <span class="text-xl font-bold tracking-tight text-gray-900">
                            Urban<span class="text-indigo-600">Shoes</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">

                    <!-- Dashboard -->
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        📊 Dashboard
                    </x-nav-link>

                    <!-- Productos -->
                    <x-nav-link
                        :href="url('/producto.index')"
                        :active="request()->routeIs('productos.*')"
                    >
                        👟 Productos
                    </x-nav-link>

                    <!-- Categorías -->
                    <x-nav-link
                        :href="url('/categorias.index')"
                        :active="request()->routeIs('categorias.*')"
                    >
                        🏷️ Categorías
                    </x-nav-link>

                    <!-- Usuarios y Roles -->
                    @hasanyrole('Administrador|Supervisor')
                        <x-nav-link
                            :href="route('users.index')"
                            :active="request()->routeIs('users.*')"
                        >
                            👥 Usuarios
                        </x-nav-link>
                    @endhasanyrole

                    <!-- Guía Técnica -->
                    <x-nav-link
                        :href="route('tutorial')"
                        :active="request()->routeIs('tutorial')"
                    >
                        📚 Guía
                    </x-nav-link>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center gap-2 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-gray-600 bg-white hover:text-gray-900 hover:bg-gray-50 focus:outline-none transition ease-in-out duration-150"
                        >

                            <!-- Avatar -->
                            <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <div>
                                {{ Auth::user()->name }}
                            </div>

                            <div>
                                <svg
                                    class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </div>

                        </button>

                    </x-slot>

                    <!-- Dropdown Content -->
                    <x-slot name="content">

                        <div class="px-4 py-3 border-b border-gray-100">

                            <p class="text-sm font-semibold text-gray-900">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-xs text-gray-500 mt-1">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                        <!-- Perfil -->
                        <x-dropdown-link :href="route('profile.edit')">
                            👤 Perfil
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                🚪 Cerrar sesión
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                >

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- Responsive Navigation Menu -->
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden"
    >

        <div class="pt-2 pb-3 space-y-1">

            <!-- Dashboard -->
            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
            >
                📊 Dashboard
            </x-responsive-nav-link>

            <!-- Productos -->
            <x-responsive-nav-link
                :href="url('/producto')"
                :active="request()->routeIs('producto.*')"
            >
                👟 Productos
            </x-responsive-nav-link>

            <!-- Categorías -->
            <x-responsive-nav-link
                :href="url('/categoria')"
                :active="request()->routeIs('categoria.*')"
            >
                🏷️ Categorías
            </x-responsive-nav-link>

            <!-- Usuarios -->
            @hasanyrole('Administrador|Supervisor')
                <x-responsive-nav-link
                    :href="route('users.index')"
                    :active="request()->routeIs('users.*')"
                >
                    👥 Usuarios
                </x-responsive-nav-link>
            @endhasanyrole

            <!-- Guía -->
            <x-responsive-nav-link
                :href="route('tutorial')"
                :active="request()->routeIs('tutorial')"
            >
                📚 Guía Técnica
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>

            </div>

            <div class="mt-3 space-y-1">

                <!-- Perfil -->
                <x-responsive-nav-link :href="route('profile.edit')">
                    👤 Perfil
                </x-responsive-nav-link>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        🚪 Cerrar sesión
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>