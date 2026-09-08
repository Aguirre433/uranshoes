```blade
<x-app-layout>

    <!-- HEADER -->
    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

            <div>
                <h2 class="font-black text-2xl text-gray-900 tracking-tight">
                    Panel de Administración
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Gestión general de UrbanShoes
                </p>
            </div>

            <div class="flex items-center gap-2">

                <span class="text-sm text-gray-500">
                    Usuario:
                </span>

                <span class="text-sm font-bold text-gray-900">
                    {{ Auth::user()->name }}
                </span>

            </div>

        </div>

    </x-slot>


    <!-- CONTENIDO -->
    <div class="py-10 bg-gray-100 min-h-[calc(100vh-65px)]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            <!-- BIENVENIDA -->
            <div class="mb-8">

                <h1 class="text-3xl font-black text-gray-900">
                    Bienvenido a UrbanShoes 👟
                </h1>

                <p class="text-gray-500 mt-2">
                    Desde este panel podés administrar los recursos de la tienda.
                </p>

            </div>


            <!-- ESTADISTICAS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">


                <!-- PRODUCTOS -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-semibold text-gray-500">
                                Productos
                            </p>

                            <p class="text-3xl font-black text-gray-900 mt-2">
                                125
                            </p>

                        </div>

                        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl">
                            👟
                        </div>

                    </div>

                    <p class="text-xs text-gray-400 mt-4">
                        Productos registrados
                    </p>

                </div>


                <!-- CATEGORIAS -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-semibold text-gray-500">
                                Categorías
                            </p>

                            <p class="text-3xl font-black text-gray-900 mt-2">
                                12
                            </p>

                        </div>

                        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl">
                            📂
                        </div>

                    </div>

                    <p class="text-xs text-gray-400 mt-4">
                        Categorías disponibles
                    </p>

                </div>


                <!-- VENTAS -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-semibold text-gray-500">
                                Ventas
                            </p>

                            <p class="text-3xl font-black text-gray-900 mt-2">
                                48
                            </p>

                        </div>

                        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl">
                            🛒
                        </div>

                    </div>

                    <p class="text-xs text-gray-400 mt-4">
                        Ventas registradas
                    </p>

                </div>


                <!-- STOCK -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-semibold text-gray-500">
                                Stock bajo
                            </p>

                            <p class="text-3xl font-black text-gray-900 mt-2">
                                7
                            </p>

                        </div>

                        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl">
                            📦
                        </div>

                    </div>

                    <p class="text-xs text-gray-400 mt-4">
                        Productos para revisar
                    </p>

                </div>

            </div>


            <!-- SECCIONES PRINCIPALES -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                <!-- GESTION -->
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-200">

                    <div class="p-6 border-b border-gray-200">

                        <h2 class="text-xl font-black text-gray-900">
                            Gestión del sistema
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Accesos rápidos a los principales módulos.
                        </p>

                    </div>


                    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-4">


                      <!-- PRODUCTOS -->
<a href="{{ route('productos.index') }}"
   class="group flex items-center gap-4 p-5 rounded-xl border border-gray-200 hover:border-gray-400 hover:shadow-md transition">

    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl group-hover:bg-black group-hover:text-white transition">
        👟
    </div>

    <div>
        <h3 class="font-bold text-gray-900">
            Productos
        </h3>

        <p class="text-sm text-gray-500">
            Administrar zapatillas
        </p>
    </div>

</a>


                       <!-- CATEGORIAS -->
<a href="{{ route('categorias.index') }}"
   class="group flex items-center gap-4 p-5 rounded-xl border border-gray-200 hover:border-gray-400 hover:shadow-md transition">

    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl group-hover:bg-black group-hover:text-white transition">
        📂
    </div>

    <div>
        <h3 class="font-bold text-gray-900">
            Categorías
        </h3>

        <p class="text-sm text-gray-500">
            Gestionar categorías
        </p>
    </div>

</a>

                        <!-- USUARIOS -->
                        <a href="{{ url('/users') }}"
                           class="group flex items-center gap-4 p-5 rounded-xl border border-gray-200 hover:border-gray-400 hover:shadow-md transition">

                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl group-hover:bg-black group-hover:text-white transition">
                                👥
                            </div>

                            <div>

                                <h3 class="font-bold text-gray-900">
                                    Usuarios
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Gestionar usuarios
                                </p>

                            </div>

                        </a>


                        <!-- STOCK -->
                        <a href="#"
                           class="group flex items-center gap-4 p-5 rounded-xl border border-gray-200 hover:border-gray-400 hover:shadow-md transition">

                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl group-hover:bg-black group-hover:text-white transition">
                                📦
                            </div>

                            <div>

                                <h3 class="font-bold text-gray-900">
                                    Stock
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Control de inventario
                                </p>

                            </div>

                        </a>


                        <!-- VENTAS -->
                        <a href="#"
                           class="group flex items-center gap-4 p-5 rounded-xl border border-gray-200 hover:border-gray-400 hover:shadow-md transition">

                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl group-hover:bg-black group-hover:text-white transition">
                                🛒
                            </div>

                            <div>

                                <h3 class="font-bold text-gray-900">
                                    Ventas
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Consultar ventas
                                </p>

                            </div>

                        </a>


                        <!-- COMPRAS -->
                        <a href="#"
                           class="group flex items-center gap-4 p-5 rounded-xl border border-gray-200 hover:border-gray-400 hover:shadow-md transition">

                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-2xl group-hover:bg-black group-hover:text-white transition">
                                🧾
                            </div>

                            <div>

                                <h3 class="font-bold text-gray-900">
                                    Compras
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Gestionar compras
                                </p>

                            </div>

                        </a>

                    </div>

                </div>


                <!-- ACTIVIDAD -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200">

                    <div class="p-6 border-b border-gray-200">

                        <h2 class="text-xl font-black text-gray-900">
                            Actividad reciente
                        </h2>

                    </div>


                    <div class="p-6 space-y-6">


                        <div class="flex gap-3">

                            <div class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center">
                                👟
                            </div>

                            <div>

                                <p class="text-sm font-semibold text-gray-900">
                                    Producto agregado
                                </p>

                                <p class="text-xs text-gray-400 mt-1">
                                    Nike Air Max Urban
                                </p>

                            </div>

                        </div>


                        <div class="flex gap-3">

                            <div class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center">
                                📂
                            </div>

                            <div>

                                <p class="text-sm font-semibold text-gray-900">
                                    Categoría actualizada
                                </p>

                                <p class="text-xs text-gray-400 mt-1">
                                    Zapatillas Urbanas
                                </p>

                            </div>

                        </div>


                        <div class="flex gap-3">

                            <div class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center">
                                🛒
                            </div>

                            <div>

                                <p class="text-sm font-semibold text-gray-900">
                                    Nueva venta registrada
                                </p>

                                <p class="text-xs text-gray-400 mt-1">
                                    Venta #00048
                                </p>

                            </div>

                        </div>


                        <div class="flex gap-3">

                            <div class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center">
                                👤
                            </div>

                            <div>

                                <p class="text-sm font-semibold text-gray-900">
                                    Nuevo usuario
                                </p>

                                <p class="text-xs text-gray-400 mt-1">
                                    Usuario registrado
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- INFORMACION -->
            <div class="mt-6 bg-black text-white rounded-2xl p-6">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div>

                        <p class="text-xs uppercase tracking-widest text-gray-400 font-bold">
                            UrbanShoes
                        </p>

                        <h2 class="text-xl font-black mt-1">
                            Sistema de gestión de zapatillas
                        </h2>

                    </div>

                    <p class="text-sm text-gray-400">
                        Panel administrativo
                    </p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
```

