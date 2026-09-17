<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Categorías | UrbanShoes Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800 min-h-screen flex flex-col">

    <!-- BARRA SUPERIOR DE NAVEGACIÓN -->
    <header class="bg-black text-white py-4 px-6 shadow-md flex justify-between items-center border-b border-orange-500">
        <div class="flex items-center gap-3">
            <span class="bg-orange-500 text-black font-black text-xs px-2.5 py-1 rounded-md uppercase">ADMIN</span>
            <h1 class="text-xl font-black tracking-wider uppercase">Urban<span class="text-orange-500">Shoes</span></h1>
        </div>
        <div class="flex items-center gap-4 text-xs font-bold">
            <a href="{{ url('/') }}" class="text-gray-400 hover:text-white transition">Ver Tienda ↗</a>
            <span class="text-gray-600">|</span>
            <span class="text-emerald-400 font-semibold">● Panel Activo</span>
        </div>
    </header>

    <!-- PANEL PRINCIPAL -->
    <main class="max-w-7xl mx-auto px-4 py-8 w-full flex-1">
        
        <!-- MENSAJES DE ESTADO (FEEDBACK DE GUARDADO/EDICIÓN) -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-100 border-l-4 border-emerald-500 text-emerald-800 rounded-r-xl text-sm font-bold flex justify-between items-center">
                <span>✓ {{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-emerald-900 font-black">×</button>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- COLUMNA IZQUIERDA: FORMULARIO DE CREAR / EDITAR -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 h-fit sticky top-6">
                <div class="flex items-center justify-between mb-6 pb-3 border-b border-gray-100">
                    <h2 class="text-lg font-black text-gray-900">
                        {{ isset($categoriaEditar) ? 'Editar Categoría' : 'Nueva Categoría' }}
                    </h2>
                    @if(isset($categoriaEditar))
                        <a href="{{ route('categorias.index') }}" class="text-xs text-orange-600 hover:underline font-bold">+ Cancelar Edición</a>
                    @endif
                </div>

                <!-- FORMULARIO DINÁMICO -->
                <form action="{{ isset($categoriaEditar) ? route('categorias.update', $categoriaEditar->id) : route('categorias.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if(isset($categoriaEditar))
                        @method('PUT')
                    @endif

                    <!-- Nombre -->
                    <div>
                        <label class="block text-xs font-black uppercase text-gray-600 mb-1">Nombre de la Categoría</label>
                        <input type="text" name="nombre" value="{{ $categoriaEditar->nombre ?? old('nombre') }}" placeholder="Ej: Running, Urbanas..." required class="w-full px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-black text-sm font-semibold">
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label class="block text-xs font-black uppercase text-gray-600 mb-1">Descripción</label>
                        <textarea name="descripcion" rows="3" placeholder="Breve descripción del calzado de esta categoría..." class="w-full px-3.5 py-2.5 rounded-xl border border-gray-300 focus:outline-none focus:border-black text-sm font-medium resize-none">{{ $categoriaEditar->descripcion ?? old('descripcion') }}</textarea>
                    </div>

                    <!-- Botón de Guardar / Actualizar -->
                    <button type="submit" class="w-full bg-black hover:bg-orange-500 hover:text-black text-white font-bold py-3 rounded-xl text-xs uppercase tracking-wider transition duration-200 shadow-md">
                        {{ isset($categoriaEditar) ? '✓ Guardar Cambios' : '+ Guardar Categoría' }}
                    </button>
                </form>
            </div>


            <!-- COLUMNA DERECHA: TABLA DE GESTIÓN ADMINISTRATIVA -->
            <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden flex flex-col">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <div>
                        <h2 class="text-lg font-black text-gray-900">Listado Administrativo</h2>
                        <p class="text-xs text-gray-500">Gestiona, edita o elimina categorías del sistema</p>
                    </div>
                    <span class="text-xs font-black bg-gray-200 text-gray-700 px-3 py-1 rounded-full">
                        {{ isset($categorias) ? $categorias->count() : 3 }} Registros
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200 bg-gray-100/70 text-[11px] font-black uppercase text-gray-500 tracking-wider">
                                <th class="p-4">Descripción</th>
                                <th class="p-4 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-xs font-medium">

                            <!-- BUCLE REAL DE TU BASE DE DATOS -->
                            @forelse($categorias ?? [] as $cat)
                                <tr class="hover:bg-orange-50/40 transition">
                                    <td class="p-4 font-black text-gray-900 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center font-black text-orange-500 border border-gray-200">
                                            {{ substr($cat->nombre, 0, 1) }}
                                        </div>
                                        {{ $cat->nombre }}
                                    </td>
                                    <td class="p-4 text-gray-600 max-w-xs truncate">{{ $cat->descripcion ?? 'Sin descripción' }}</td>
                                    <td class="p-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('categorias.edit', $cat->id) }}" class="bg-gray-100 hover:bg-black hover:text-white text-gray-800 font-bold px-3 py-1.5 rounded-lg transition text-[11px]">
                                                Editar
                                            </a>
                                            <form action="{{ route('categorias.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta categoría?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-50 hover:bg-red-600 hover:text-white text-red-600 font-bold px-3 py-1.5 rounded-lg transition text-[11px]">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <!-- EJEMPLOS ESTATICOS PARA VISUALIZACIÓN EN DASHBOARD -->
                                <tr class="hover:bg-orange-50/40 transition">
                                    <td class="p-4 font-black text-gray-900 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center font-black text-orange-500 border border-gray-200">U</div>
                                        Urbanas
                                    </td>
                                    <td class="p-4 text-gray-500 font-mono text-[11px]">/urbanas</td>
                                    <td class="p-4 text-gray-600 max-w-xs truncate">Zapatillas para uso diario y estilo de vida urbano.</td>
                                    <td class="p-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button class="bg-gray-100 hover:bg-black hover:text-white text-gray-800 font-bold px-3 py-1.5 rounded-lg transition text-[11px]">Editar</button>
                                            <button class="bg-red-50 hover:bg-red-600 hover:text-white text-red-600 font-bold px-3 py-1.5 rounded-lg transition text-[11px]">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-orange-50/40 transition">
                                    <td class="p-4 font-black text-gray-900 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center font-black text-orange-500 border border-gray-200">R</div>
                                        Running
                                    </td>
                                    <td class="p-4 text-gray-500 font-mono text-[11px]">/running</td>
                                    <td class="p-4 text-gray-600 max-w-xs truncate">Diseñadas para máxima amortiguación al correr.</td>
                                    <td class="p-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button class="bg-gray-100 hover:bg-black hover:text-white text-gray-800 font-bold px-3 py-1.5 rounded-lg transition text-[11px]">Editar</button>
                                            <button class="bg-red-50 hover:bg-red-600 hover:text-white text-red-600 font-bold px-3 py-1.5 rounded-lg transition text-[11px]">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-orange-50/40 transition">
                                    <td class="p-4 font-black text-gray-900 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center font-black text-orange-500 border border-gray-200">B</div>
                                        Basketball
                                    </td>
                                    <td class="p-4 text-gray-500 font-mono text-[11px]">/basketball</td>
                                    <td class="p-4 text-gray-600 max-w-xs truncate">Botitas y calzado de agarre superior en cancha.</td>
                                    <td class="p-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button class="bg-gray-100 hover:bg-black hover:text-white text-gray-800 font-bold px-3 py-1.5 rounded-lg transition text-[11px]">Editar</button>
                                            <button class="bg-red-50 hover:bg-red-600 hover:text-white text-red-600 font-bold px-3 py-1.5 rounded-lg transition text-[11px]">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER ADMIN -->
    <footer class="bg-black text-gray-500 text-xs text-center py-4 border-t border-gray-800">
        UrbanShoes Admin System — Módulo de Gestión de Categorías
    </footer>

</body>
</html>