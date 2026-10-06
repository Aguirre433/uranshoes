<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Órdenes de Compra</h1>
            <a href="#" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                + Nueva Orden de Compra
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b text-xs text-gray-500 uppercase">
                            <th class="py-3 px-4">N° Orden</th>
                            <th class="py-3 px-4">Proveedor</th>
                            <th class="py-3 px-4">Fecha Pedido</th>
                            <th class="py-3 px-4">Total</th>
                            <th class="py-3 px-4">Estado Pedido</th>
                            <th class="py-3 px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-sm">
                        @forelse ($compras as $compra)
                            <tr>
                                <td class="py-3 px-4 font-mono text-xs">{{ $compra->numero_orden }}</td>
                                <td class="py-3 px-4 font-medium text-gray-900">{{ $compra->proveedor }}</td>
                                <td class="py-3 px-4 text-gray-600">{{ $compra->created_at->format('d/m/Y') }}</td>
                                <td class="py-3 px-4 font-semibold text-gray-800">${{ number_format($compra->total, 2) }}</td>
                                <td class="py-3 px-4">
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-0.5 rounded-full font-medium">
                                        {{ $compra->estado }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-gray-500">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium">Ver Recibo</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-gray-500">
                                    No hay compras registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>