<x-app-layout>

    <div class="max-w-3xl mx-auto">
        <!-- BANNER SUPERIOR -->
        <div class="bg-gradient-to-r from-blue-900 via-[#1E56A0] to-blue-700 text-white rounded-2xl p-6 shadow-md border border-blue-800 mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold">➕ Crear Nuevo Usuario</h1>
                <p class="text-blue-100 text-xs mt-0.5">Ingresá los datos del nuevo usuario con acceso al sistema.</p>
            </div>
            <a href="{{ route('users.index') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 text-xs font-bold px-4 py-2 rounded-xl transition">
                ⬅ Volver
            </a>
        </div>

        <!-- ERRORES DE VALIDACIÓN -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 text-xs rounded-xl">
                <p class="font-bold mb-1">Por favor corregí los siguientes errores:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORMULARIO DE CREACIÓN -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
            <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Nombre de usuario --}}
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nombre Completo *</label>
                    <input type="text" 
                           name="nombre_usuario" 
                           value="{{ old('nombre_usuario') }}" 
                           placeholder="Ej: Juan Pérez"
                           class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                           required>
                </div>

                {{-- Email de usuario --}}
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Correo Electrónico *</label>
                    <input type="email" 
                           name="email_usuario" 
                           value="{{ old('email_usuario') }}" 
                           placeholder="usuario@ejemplo.com"
                           class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                           required>
                </div>

                {{-- Contraseña --}}
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Contraseña *</label>
                    <input type="password" 
                           name="contrasena_usuario" 
                           placeholder="Mínimo 6 caracteres"
                           class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                           required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Rol de usuario --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Rol *</label>
                        <select name="rol_usuario" class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="Administrador" {{ old('rol_usuario') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                            <option value="Vendedor" {{ old('rol_usuario') == 'Vendedor' ? 'selected' : '' }}>Vendedor</option>
                            <option value="Soporte" {{ old('rol_usuario') == 'Soporte' ? 'selected' : '' }}>Soporte</option>
                        </select>
                    </div>

                    {{-- Sucursal (por defecto 1) --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Sucursal ID *</label>
                        <input type="number" 
                               name="sucursal_id" 
                               value="{{ old('sucursal_id', 1) }}" 
                               class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                               required>
                    </div>
                </div>

                {{-- Botones de Acción --}}
                <div class="pt-4 flex gap-3">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-sm transition">
                        💾 Guardar Usuario
                    </button>
                    <a href="{{ route('users.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold px-5 py-2.5 rounded-xl transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>