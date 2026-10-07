<x-app-layout>

    <!-- BANNER SUPERIOR CON ESTILO DASHBOARD -->
    <div class="bg-gradient-to-r from-blue-900 via-[#1E56A0] to-blue-700 text-white rounded-2xl p-6 shadow-md border border-blue-800 mb-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="inline-flex items-center gap-1.5 bg-white/20 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">
                    🛍️ Proveedores e Inventario
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Órdenes de Compra
                </h1>
                <p class="text-blue-100 text-sm mt-1">
                    Gestioná los ingresos de mercadería, reabastecimiento y relación con proveedores.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 text-xs font-bold px-4 py-2.5 rounded-xl transition">
                    🏠 Panel Principal
                </a>
                <a href="{{ route('compras.create') }}" class="bg-white text-[#1E56A0] hover:bg-blue-50 text-xs font-bold px-4 py-2.5 rounded-xl shadow-sm transition flex items-center gap-2">
                    <span>➕</span> Nueva Orden de Compra
                </a>
            </div>
        </div>
    </div>

    <!-- NOTIFICACIONES -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm rounded-xl flex items-center justify-between">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-emerald-600 font-bold">&times;</button>
        </div>
    @endif

    <!-- TABLA DE COMPRAS -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 text-white text-xs uppercase tracking-wider">
                        <th class="py-3.5 px-5">N° ORDEN</th>
                        <th class="py-3.5 px-5">PROVEEDOR</th>
                        <th class="py-3.5 px-5">PRODUCTO</th>
                        <th class="py-3.5 px-5">FECHA PEDIDO</th>
                        <th class="py-3.5 px-5">TOTAL</th>
                        <th class="py-3.5 px-5">ESTADO PEDIDO</th>
                        <th class="py-3.5 px-5 text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($compras as $compra)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-5 text-slate-800 font-bold">
                                {{ $compra->numero_orden }}
                            </td>
                            
                            <td class="py-4 px-5 text-slate-700 font-semibold">
                                {{ $compra->proveedor }}
                            </td>

                            <td class="py-4 px-5 text-slate-600">
                                {{ $compra->producto->nombre ?? 'N/A' }} (x{{ $compra->cantidad }})
                            </td>

                            <td class="py-4 px-5 text-slate-500 text-xs">
                                {{ \Carbon\Carbon::parse($compra->fecha_pedido)->format('d/m/Y') }}
                            </td>

                            <td class="py-4 px-5 font-extrabold text-[#1E56A0]">
                                ${{ number_format($compra->total, 2, ',', '.') }}
                            </td>

                            <td class="py-4 px-5">
                                <span class="inline-block bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-2.5 py-1 rounded-md">
                                    {{ $compra->estado_pedido }}
                                </span>
                            </td>

                            <td class="py-4 px-5 text-center">
                                <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" onsubmit="return confirm('¿Anular esta orden de compra?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-rose-100 hover:bg-rose-200 text-rose-800 text-xs font-bold px-3 py-1.5 rounded-lg transition">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400">
                                No hay compras registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>