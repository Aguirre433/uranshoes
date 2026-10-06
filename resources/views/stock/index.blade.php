<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Control de Inventario y Stock</h1>
            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                + Nuevo Producto
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b text-xs text-gray-500 uppercase">
                            <th class="py-3 px-4">SKU</th>
                            <th class="py-3 px-4">Producto</th>
                            <th class="py-3 px-4">Categoría</th>
                            <th class="py-3 px-4">Stock</th>
                            <th class="py-3 px-4">Precio</th>
                            <th class="py-3 px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-sm">
                        @forelse ($productos as $producto)
                            <tr>
                                <td class="py-3 px-4 font-mono text-xs">{{ $producto->sku }}</td>
                                <td class="py-3 px-4 font-medium text-gray-900">{{ $producto->nombre }}</td>
                                <td class="py-3 px-4 text-gray-600">{{ $producto->categoria ?? 'Sin categoría' }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2.5 py-0.5 rounded-full font-medium text-xs {{ $producto->stock > 5 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $producto->stock }} Unidades
                                    </span>
                                </td>
                                <td class="py-3 px-4 font-semibold text-gray-800">${{ number_format($producto->precio, 2) }}</td>
                                <td class="py-3 px-4 text-gray-500">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-gray-500">
                                    No hay productos registrados en el inventario.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>