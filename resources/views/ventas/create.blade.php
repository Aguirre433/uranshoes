<x-app-layout>

    <div class="max-w-3xl mx-auto">
        <!-- BANNER SUPERIOR -->
        <div class="bg-gradient-to-r from-blue-900 via-[#1E56A0] to-blue-700 text-white rounded-2xl p-6 shadow-md border border-blue-800 mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-extrabold">➕ Registrar Nueva Venta</h1>
                <p class="text-blue-100 text-xs mt-0.5">Seleccioná el producto e ingresá los datos del cliente.</p>
            </div>
            <a href="{{ route('ventas.index') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/30 text-xs font-bold px-4 py-2 rounded-xl transition">
                ⬅ Volver
            </a>
        </div>

        <!-- FORMULARIO -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
            <form action="{{ route('ventas.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Cliente --}}
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Nombre del Cliente *</label>
                    <input type="text" 
                           name="cliente_nombre" 
                           value="{{ old('cliente_nombre') }}" 
                           placeholder="Ej: Carlos Gómez" 
                           class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                           required>
                </div>

                {{-- Producto --}}
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Producto / Zapatilla *</label>
                    <select name="producto_id" class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="">-- Seleccionar producto --</option>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                                {{ $producto->nombre }} - ${{ number_format($producto->precio, 2, ',', '.') }} (Stock: {{ $producto->stock }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Cantidad --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Cantidad *</label>
                        <input type="number" 
                               name="cantidad" 
                               value="{{ old('cantidad', 1) }}" 
                               min="1" 
                               class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                               required>
                    </div>

                    {{-- Método de Pago --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Método de Pago *</label>
                        <select name="metodo_pago" class="w-full text-sm border-slate-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                            <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                        </select>
                    </div>
                </div>

                {{-- Botones --}}
                <div class="pt-4 flex gap-3">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-sm transition">
                        💾 Confirmar y Guardar Venta
                    </button>
                    <a href="{{ route('ventas.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold px-5 py-2.5 rounded-xl transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>