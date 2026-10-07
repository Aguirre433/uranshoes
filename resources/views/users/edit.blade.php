<x-app-layout>

    <div class="max-w-3xl mx-auto">
        <div class="bg-gradient-to-r from-blue-900 via-[#1E56A0] to-blue-700 text-white rounded-2xl p-6 shadow-md border border-blue-800 mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold">✏️ Editar Usuario</h1>
                <p class="text-blue-100 text-xs mt-0.5">Modificá los datos del usuario #{{ $user->id }}.</p>
            </div>
            <a href="{{ route('users.index') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 text-xs font-bold px-4 py-2 rounded-xl transition">
                ⬅ Volver
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
            <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nombre Completo *</label>
    <input type="text" name="nombre_usuario" value="{{ old('nombre_usuario', $user->nombre_usuario) }}" class="w-full text-sm border-slate-300 rounded-xl shadow-sm" required>
</div>

<div>
    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Correo Electrónico *</label>
    <input type="email" name="email_usuario" value="{{ old('email_usuario', $user->email_usuario) }}" class="w-full text-sm border-slate-300 rounded-xl shadow-sm" required>
</div>

<div>
    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nueva Contraseña (Opcional)</label>
    <input type="password" name="contrasena_usuario" placeholder="Dejá en blanco si no querés cambiarla" class="w-full text-sm border-slate-300 rounded-xl shadow-sm">
</div>

<div>
    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Rol</label>
    <select name="rol_usuario" class="w-full text-sm border-slate-300 rounded-xl shadow-sm">
        <option value="Administrador" {{ old('rol_usuario', $user->rol_usuario) == 'Administrador' ? 'selected' : '' }}>Administrador</option>
        <option value="Vendedor" {{ old('rol_usuario', $user->rol_usuario) == 'Vendedor' ? 'selected' : '' }}>Vendedor</option>
    </select>
</div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Estado</label>
                        <select name="status" class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="activo" {{ old('status', $user->status) == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('status', $user->status) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-sm transition">
                        ✏️ Actualizar Usuario
                    </button>
                    <a href="{{ route('users.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold px-5 py-2.5 rounded-xl transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>