<x-app-layout>

    <!-- BANNER SUPERIOR CON ESTILO DASHBOARD -->
    <div class="bg-gradient-to-r from-blue-900 via-[#1E56A0] to-blue-700 text-white rounded-2xl p-6 shadow-md border border-blue-800 mb-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="inline-flex items-center gap-1.5 bg-white/20 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">
                    🛒 Módulo de Ventas
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Gestión de Ventas y Facturación
                </h1>
                <p class="text-blue-100 text-sm mt-1">
                    Administrá las órdenes realizadas, métodos de pago y comprobantes de UrbanShoes.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 text-xs font-bold px-4 py-2.5 rounded-xl transition">
                    🏠 Panel Principal
                </a>
                <a href="{{ route('ventas.create') }}" class="bg-white text-[#1E56A0] hover:bg-blue-50 text-xs font-bold px-4 py-2.5 rounded-xl shadow-sm transition flex items-center gap-2">
                    <span>➕</span> Registrar Venta
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

    @if(session('error'))
        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 text-sm rounded-xl flex items-center justify-between">
            <span>{{ session('error') }}</span>
            <button onclick="this.parentElement.remove()" class="text-rose-600 font-bold">&times;</button>
        </div>
    @endif

    <!-- TABLA DE VENTAS -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 text-white text-xs uppercase tracking-wider">
                        <th class="py-3.5 px-5">Factura</th>
                        <th class="py-3.5 px-5">Cliente</th>
                        <th class="py-3.5 px-5">Producto</th>
                        <th class="py-3.5 px-5">Cant.</th>
                        <th class="py-3.5 px-5">Precio Unit.</th>
                        <th class="py-3.5 px-5">Total</th>
                        <th class="py-3.5 px-5">Método Pago</th>
                        <th class="py-3.5 px-5">Estado</th>
                        <th class="py-3.5 px-5 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($ventas as $venta)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-4 px-5 text-slate-800 font-bold">
                                {{ $venta->codigo_factura }}
                            </td>
                            
                            <td class="py-4 px-5 text-slate-700 font-semibold">
                                {{ $venta->cliente_nombre }}
                            </td>

                            <td class="py-4 px-5 text-slate-600">
                                {{ $venta->producto->nombre ?? 'Producto eliminado' }}
                            </td>

                            <td class="py-4 px-5 font-bold text-slate-800">
                                {{ $venta->cantidad }} un.
                            </td>

                            <td class="py-4 px-5 text-slate-600">
                                ${{ number_format($venta->precio_unitario, 2, ',', '.') }}
                            </td>

                            <td class="py-4 px-5 font-extrabold text-[#1E56A0]">
                                ${{ number_format($venta->total, 2, ',', '.') }}
                            </td>

                            <td class="py-4 px-5">
                                <span class="inline-block bg-slate-100 text-slate-700 border border-slate-200 text-xs font-semibold px-2.5 py-1 rounded-md">
                                    {{ $venta->metodo_pago }}
                                </span>
                            </td>

                            <td class="py-4 px-5">
                                <span class="inline-block bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold px-2.5 py-1 rounded-md">
                                    {{ $venta->estado }}
                                </span>
                            </td>

                            <td class="py-4 px-5 text-center">
                                <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" onsubmit="return confirm('¿Anular esta venta y devolver el stock?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-rose-100 hover:bg-rose-200 text-rose-800 text-xs font-bold px-3 py-1.5 rounded-lg transition">
                                        🗑️ Anular
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-8 text-center text-slate-500">
                                No hay ventas registradas aún.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>