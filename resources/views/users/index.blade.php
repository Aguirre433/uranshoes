<x-app-layout>

    <!-- BANNER SUPERIOR CON ESTILO DASHBOARD -->
    <div class="bg-gradient-to-r from-blue-900 via-[#1E56A0] to-blue-700 text-white rounded-2xl p-6 shadow-md border border-blue-800 mb-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="inline-flex items-center gap-1.5 bg-white/20 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">
                    🛡️ Control de Accesos
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Gestión de Usuarios del Sistema
                </h1>
                <p class="text-blue-100 text-sm mt-1">
                    Administrá los accesos, roles y permisos de los usuarios registrados en UrbanShoes.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 text-xs font-bold px-4 py-2.5 rounded-xl transition">
                    🏠 Panel Principal
                </a>
                <a href="{{ route('users.create') }}" class="bg-white text-[#1E56A0] hover:bg-blue-50 text-xs font-bold px-4 py-2.5 rounded-xl shadow-sm transition flex items-center gap-2">
                    <span>➕</span> Nuevo Usuario
                </a>
            </div>
        </div>
    </div>

    <!-- MENSAJES DE NOTIFICACIÓN -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm rounded-xl flex items-center justify-between">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-emerald-600 font-bold">&times;</button>
        </div>
    @endif

    <!-- TABLA DE USUARIOS -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 text-white text-xs uppercase tracking-wider">
                        <th class="py-3.5 px-5">ID</th>
                        <th class="py-3.5 px-5">Nombre</th>
                        <th class="py-3.5 px-5">Email</th>
                        <th class="py-3.5 px-5">Rol</th>
                        <th class="py-3.5 px-5">Estado</th>
                        <th class="py-3.5 px-5 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-5 text-slate-400 font-bold">#{{ $user->id }}</td>
                            
                            <td class="py-4 px-5 font-bold text-slate-800">
                                {{ $user->nambre_usuario }}
                            </td>
                            
                            <td class="py-4 px-5 text-slate-600">
                                {{ $user->email_usuario }}
                            </td>

                            <td class="py-4 px-5">
                                <span class="inline-block bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-2.5 py-1 rounded-md">
                                    {{ $user->rol_usuario ?? 'Administrador' }}
                                </span>
                            </td>

                            <td class="py-4 px-5">
                                @if(($user->status ?? 'activo') == 'activo')
                                    <span class="inline-block bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-2.5 py-1 rounded-md">
                                        Activo
                                    </span>
                                @else
                                    <span class="inline-block bg-slate-100 text-slate-600 border border-slate-200 text-xs font-semibold px-2.5 py-1 rounded-md">
                                        Inactivo
                                    </span>
                                @endif
                            </td>

                            <td class="py-4 px-5 text-center">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="bg-amber-100 hover:bg-amber-200 text-amber-800 text-xs font-bold px-3 py-1.5 rounded-lg transition">
                                        ✏️ Editar
                                    </a>

                                    @if(Auth::id() !== $user->id)
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Seguro que querés eliminar este usuario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-rose-100 hover:bg-rose-200 text-rose-800 text-xs font-bold px-3 py-1.5 rounded-lg transition">
                                                🗑️
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-500">
                                No hay usuarios registrados en el sistema.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>