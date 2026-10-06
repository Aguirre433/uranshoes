<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Usuarios del Sistema') }}
        </h2>
    </x-slot>

<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b text-xs text-gray-500 uppercase">
                <th class="py-3 px-4">Nombre</th>
                <th class="py-3 px-4">Email</th>
                <th class="py-3 px-4">Rol</th>
                <th class="py-3 px-4">Estado</th>
                <th class="py-3 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y text-sm">
            @forelse ($usuarios as $usuario)
                <tr>
                    <!-- Nombre del usuario -->
                    <td class="py-3 px-4 font-medium text-gray-900">
                        {{ $usuario->nombre_usuario }}
                    </td>

                    <!-- Email del usuario -->
                    <td class="py-3 px-4 text-gray-600">
                        {{ $usuario->email_usuario }}
                    </td>

                    <!-- Rol del usuario -->
                    <td class="py-3 px-4">
                        @if($usuario->rol_usuario)
                            <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded font-medium">
                                {{ $usuario->rol_usuario }}
                            </span>
                        @else
                            <span class="text-xs text-red-500 italic">
                                Sin rol asignado
                            </span>
                        @endif
                    </td>

                    <!-- Estado de la cuenta -->
                    <td class="py-3 px-4">
                        {{-- Muestra "Activo" por defecto si no hay columna de estado definida --}}
                        @if($usuario->activo ?? true)
                            <span class="bg-green-100 text-green-800 text-xs px-2.5 py-0.5 rounded-full font-medium">
                                Activo
                            </span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs px-2.5 py-0.5 rounded-full font-medium">
                                Inactivo
                            </span>
                        @endif
                    </td>

                    <!-- Acciones -->
                    <td class="py-3 px-4 text-gray-500">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">
                        No hay usuarios registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>