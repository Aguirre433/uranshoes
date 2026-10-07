<x-app-layout>

    <div class="max-w-3xl mx-auto">
        <div class="bg-gradient-to-r from-blue-900 via-[#1E56A0] to-blue-700 text-white rounded-2xl p-6 shadow-md border border-blue-800 mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold">➕ Registrar Nueva Orden de Compra</h1>
                <p class="text-blue-100 text-xs mt-0.5">Ingresá los datos de la compra a proveedores para sumar stock.</p>
            </div>
            <a href="{{ route('compras.index') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 text-xs font-bold px-4 py-2 rounded-xl transition">
                ⬅ Volver
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
            <form action="{{ route('compras.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Proveedor *</label>
                    <input type="text" name="proveedor" placeholder="Ej: Nike Distribuidora Oficial" class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Producto a Ingresar *</label>
                    <select name="producto_id" class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="">-- Seleccionar producto --</option>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">
                                {{ $producto->nombre }} (Stock actual: {{ $producto->stock }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Cantidad *</label>
                        <input type="number" name="cantidad" value="1" min="1" class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Precio Costo (Unidad) *</label>
                        <input type="number" step="0.01" name="precio_costo" placeholder="Ej: 15000" class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Fecha Pedido *</label>
                        <input type="date" name="fecha_pedido" value="{{ date('Y-m-d') }}" class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-sm transition">
                        💾 Registrar Compra y Sumar Stock
                    </button>
                    <a href="{{ route('compras.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold px-5 py-2.5 rounded-xl transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>