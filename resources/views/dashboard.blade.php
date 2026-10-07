<x-app-layout>

    <!-- HEADER DE PÁGINA -->
    <x-slot name="header">
        <div>
            <h2 class="font-extrabold text-2xl text-slate-800 tracking-tight">
                Panel de Administración
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">
                Gestión general de UrbanShoes
            </p>
        </div>

        <div class="flex items-center gap-2 bg-slate-100 px-3 py-1.5 rounded-lg border border-slate-200">
            <span class="text-xs text-slate-500">Usuario:</span>
            <span class="text-xs font-bold text-slate-800">
                {{ Auth::user()->name }}
            </span>
        </div>
    </x-slot>

    <!-- CONTENIDO DEL DASHBOARD -->
    <div class="space-y-6">

        <!-- MENSAJE DE BIENVENIDA CON ENCABEZADO DESTACADO -->
        <div class="bg-gradient-to-r from-blue-900 via-[#1E56A0] to-blue-700 text-white rounded-2xl p-6 shadow-md border border-blue-800 relative overflow-hidden">
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 bg-blue-800/80 px-3 py-1 rounded-full text-xs font-semibold text-blue-200 mb-2 border border-blue-700/50">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    Sistema operativo
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Bienvenido a UrbanShoes 👟
                </h1>
                <p class="text-blue-100 text-sm mt-1 max-w-xl">
                    Desde este panel podés administrar todos los recursos, stock, usuarios y ventas de la tienda.
                </p>
            </div>
            <!-- Marca de agua decorativa -->
            <span class="absolute -right-6 -bottom-8 text-8xl opacity-10 select-none font-black text-white pointer-events-none">
                URBAN
            </span>
        </div>

        <!-- TARJETAS DE ESTADÍSTICAS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            <!-- PRODUCTOS -->
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                            Productos
                        </p>
                        <p class="text-3xl font-extrabold text-[#1E56A0] mt-1">
                            125
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-[#1E56A0] rounded-xl flex items-center justify-center text-xl font-bold border border-blue-100">
                        👟
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <span>Productos registrados</span>
                    <span class="text-emerald-600 font-semibold">Activo</span>
                </div>
            </div>

            <!-- CATEGORÍAS -->
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                            Categorías
                        </p>
                        <p class="text-3xl font-extrabold text-[#1E56A0] mt-1">
                            12
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-[#1E56A0] rounded-xl flex items-center justify-center text-xl font-bold border border-blue-100">
                        📂
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <span>Categorías disponibles</span>
                    <span class="text-blue-600 font-semibold">En catálogo</span>
                </div>
            </div>

            <!-- VENTAS -->
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                            Ventas
                        </p>
                        <p class="text-3xl font-extrabold text-[#1E56A0] mt-1">
                            48
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-[#1E56A0] rounded-xl flex items-center justify-center text-xl font-bold border border-blue-100">
                        🛒
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <span>Ventas registradas</span>
                    <span class="text-emerald-600 font-semibold">+12% este mes</span>
                </div>
            </div>

            <!-- STOCK BAJO -->
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                            Stock bajo
                        </p>
                        <p class="text-3xl font-extrabold text-amber-600 mt-1">
                            7
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center text-xl font-bold border border-amber-100">
                        📦
                    </div>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="text-slate-500">Productos para revisar</span>
                    <span class="text-amber-600 font-semibold">Atención</span>
                </div>
            </div>

        </div>

        <!-- SECCIONES PRINCIPALES (2 COLUMNAS A LA IZQUIERDA, 1 A LA DERECHA) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- COLUMNA IZQUIERDA: MÓDULOS DE GESTIÓN (lg:col-span-2) -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200">

                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-slate-800">
                            Gestión del sistema
                        </h3>
                        <p class="text-xs text-slate-500">
                            Accesos rápidos a los principales módulos administrativos
                        </p>
                    </div>
                    <span class="text-xs bg-slate-100 text-slate-600 px-2.5 py-1 rounded-md border border-slate-200 font-medium">
                        Accesos Directos
                    </span>
                </div>

                <div class="p-5 grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <!-- PRODUCTOS -->
                    <a href="{{ route('productos.index') }}"
                       class="group flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#1E56A0] hover:shadow-md transition">
                        <div class="w-11 h-11 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-xl group-hover:bg-[#1E56A0] group-hover:text-white group-hover:border-[#1E56A0] transition">
                            👟
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm group-hover:text-[#1E56A0] transition">
                                Productos
                            </h4>
                            <p class="text-xs text-slate-500">
                                Administrar zapatillas y catálogo
                            </p>
                        </div>
                    </a>

                    <!-- CATEGORÍAS -->
                    <a href="{{ route('categorias.index') }}"
                       class="group flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#1E56A0] hover:shadow-md transition">
                        <div class="w-11 h-11 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-xl group-hover:bg-[#1E56A0] group-hover:text-white group-hover:border-[#1E56A0] transition">
                            📂
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm group-hover:text-[#1E56A0] transition">
                                Categorías
                            </h4>
                            <p class="text-xs text-slate-500">
                                Gestionar clasificaciones
                            </p>
                        </div>
                    </a>

                    <!-- USUARIOS -->
                    <a href="{{ url('/users') }}"
                       class="group flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#1E56A0] hover:shadow-md transition">
                        <div class="w-11 h-11 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-xl group-hover:bg-[#1E56A0] group-hover:text-white group-hover:border-[#1E56A0] transition">
                            👥
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm group-hover:text-[#1E56A0] transition">
                                Usuarios
                            </h4>
                            <p class="text-xs text-slate-500">
                                Roles y permisos de acceso
                            </p>
                        </div>
                    </a>

                    <!-- VENTAS -->
                    <a href="{{ route('ventas.index') }}" 
                       class="group flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#1E56A0] hover:shadow-md transition">
                        <div class="w-11 h-11 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-xl group-hover:bg-[#1E56A0] group-hover:text-white group-hover:border-[#1E56A0] transition">
                            🛒
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm group-hover:text-[#1E56A0] transition">
                                Ventas
                            </h4>
                            <p class="text-xs text-slate-500">
                                Historial de órdenes y facturación
                            </p>
                        </div>
                    </a>

                    <!-- COMPRAS -->
                    <a href="{{ route('compras.index') }}" 
                       class="group flex items-center gap-4 p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#1E56A0] hover:shadow-md transition">
                        <div class="w-11 h-11 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-xl group-hover:bg-[#1E56A0] group-hover:text-white group-hover:border-[#1E56A0] transition">
                            🛍️
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm group-hover:text-[#1E56A0] transition">
                                Compras
                            </h4>
                            <p class="text-xs text-slate-500">
                                Órdenes de compra y proveedores
                            </p>
                        </div>
                    </a>

                </div>

            </div>

            <!-- COLUMNA DERECHA: ACTIVIDAD RECIENTE (1 COLUMNA) -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 flex flex-col justify-between">

                <div>
                    <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="text-base font-bold text-slate-800">
                            Actividad reciente
                        </h3>
                        <span class="text-xs text-blue-600 font-semibold cursor-pointer hover:underline">
                            Ver todo
                        </span>
                    </div>

                    <div class="p-4">
                        <div class="flex flex-col gap-4">

                            @forelse($actividades as $actividad)

                                <div class="flex items-center gap-3">

                                    {{-- ICONO --}}
                                    <div class="w-8 h-8 rounded-lg bg-blue-50 border border-blue-100 flex items-center justify-center shrink-0">

                                        @if($actividad->tipo == 'producto')
                                            <i class="bi bi-shoe-prints text-blue-500"></i>

                                        @elseif($actividad->tipo == 'categoria')
                                            <i class="bi bi-folder-fill text-yellow-500"></i>

                                        @elseif($actividad->tipo == 'venta')
                                            <i class="bi bi-cart-check text-cyan-500"></i>

                                        @elseif($actividad->tipo == 'compra')
                                            <i class="bi bi-bag-check text-green-500"></i>

                                        @elseif($actividad->tipo == 'stock')
                                            <i class="bi bi-box-seam text-red-500"></i>

                                        @else
                                            <i class="bi bi-person-fill text-blue-500"></i>
                                        @endif

                                    </div>

                                    {{-- INFORMACIÓN --}}
                                    <div class="min-w-0">
                                        <p class="text-xs font-bold text-slate-800 truncate">
                                            {{ $actividad->titulo }}
                                        </p>
                                        <p class="text-xs text-slate-500 truncate">
                                            {{ $actividad->descripcion }}
                                        </p>
                                        <p class="text-[11px] text-slate-400">
                                            {{ $actividad->created_at ? $actividad->created_at->diffForHumans() : 'Hace un momento' }}
                                        </p>
                                    </div>

                                </div>

                            @empty

                                <p class="text-xs text-slate-500 text-center py-4">
                                    No hay actividad reciente registrada.
                                </p>

                            @endforelse

                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 border-t border-slate-100 text-center">
                    <span class="text-xs text-slate-400">
                        Historial actualizado en tiempo real
                    </span>
                </div>

            </div>

        </div>

        <!-- FOOTER / BANNER DEL DASHBOARD -->
        <div class="bg-slate-900 text-white rounded-2xl p-5 border border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-[#1E56A0] flex items-center justify-center text-lg font-bold">
                    👟
                </div>
                <div>
                    <h4 class="text-sm font-bold tracking-wide">
                        URBANSHOES <span class="text-blue-400 font-normal">| Admin Management System</span>
                    </h4>
                    <p class="text-xs text-slate-400">
                        Panel optimizado para control de productos y catálogo general.
                    </p>
                </div>
            </div>
            <div class="text-xs text-slate-400 self-end sm:self-center">
                Versión 1.0.0
            </div>
        </div>

    </div>

</x-app-layout>