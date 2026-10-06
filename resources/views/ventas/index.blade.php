<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Historial de Ventas</h1>
            <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
                + Registrar Venta
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b text-xs text-gray-500 uppercase">
                            <th class="py-3 px-4">N° Factura</th>
                            <th class="py-3 px-4">Cliente</th>
                            <th class="py-3 px-4">Fecha</th>
                            <th class="py-3 px-4">Total</th>
                            <th class="py-3 px-4">Estado</th>
                            <th class="py-3 px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-sm">
                        @forelse ($ventas as $venta)
                            <tr>
                                <td class="py-3 px-4 font-mono text-xs">{{ $venta->numero_factura }}</td>
                                <td class="py-3 px-4 font-medium text-gray-900">{{ $venta->cliente }}</td>
                                <td class="py-3 px-4 text-gray-600">{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                                <td class="py-3 px-4 font-semibold text-gray-800">${{ number_format($venta->total, 2) }}</td>
                                <td class="py-3 px-4">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded-full font-medium">
                                        {{ $venta->estado }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-gray-500">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium">Detalle</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-gray-500">
                                    No hay ventas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>