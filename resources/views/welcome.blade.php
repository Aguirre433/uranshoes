<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UrbanShoes | Catálogo Exclusivo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- HEADER / NAVBAR -->
    <header class="bg-black text-white sticky top-0 z-50 border-b border-gray-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                <span class="bg-orange-500 text-black font-black p-1.5 rounded-lg text-lg group-hover:scale-105 transition">US</span>
                <span class="text-xl font-black tracking-tight text-white">Urban<span class="text-orange-500">Shoes</span></span>
            </a>

            <nav class="flex items-center gap-6 text-sm font-bold">
                <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Inicio</a>
                <a href="{{ url('/') }}" class="text-orange-500 border-b-2 border-orange-500 pb-0.5">Catálogo</a>
                <a href="#" class="text-gray-300 hover:text-white transition flex items-center gap-1">
                    🛒 Carrito <span class="bg-orange-500 text-black text-xs font-black px-1.5 py-0.5 rounded-full">0</span>
                </a>

                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-orange-500 hover:bg-orange-600 text-black px-4 py-2 rounded-lg font-black transition">
                        Panel Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-white/10 hover:bg-white/20 text-white px-4 py-2 rounded-lg transition">
                        Ingresar
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- MAIN CONTENT AREA -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full flex-1">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- FILTROS -->
            <aside class="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm h-fit sticky top-24">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-black text-gray-900">Filtrar Productos</h2>
                    <span class="text-xs bg-orange-100 text-orange-700 font-bold px-2 py-0.5 rounded-md">Filtros</span>
                </div>
                <div class="w-full h-0.5 bg-gray-100 mb-6"></div>

                <form action="{{ url('/') }}" method="GET" class="space-y-5">
                    <div>
                        <label for="marca" class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Marca</label>
                        <select id="marca" name="marca" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent p-3 outline-none transition">
                            <option value="">Todas las marcas</option>
                            <option value="Nike" {{ request('marca') == 'Nike' ? 'selected' : '' }}>Nike</option>
                            <option value="Adidas" {{ request('marca') == 'Adidas' ? 'selected' : '' }}>Adidas</option>
                            <option value="Puma" {{ request('marca') == 'Puma' ? 'selected' : '' }}>Puma</option>
                        </select>
                    </div>

                    <div>
                        <label for="talle" class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Talle</label>
                        <select id="talle" name="talle" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent p-3 outline-none transition">
                            <option value="">Todos los talles</option>
                            <option value="39" {{ request('talle') == '39' ? 'selected' : '' }}>39</option>
                            <option value="40" {{ request('talle') == '40' ? 'selected' : '' }}>40</option>
                            <option value="41" {{ request('talle') == '41' ? 'selected' : '' }}>41</option>
                            <option value="42" {{ request('talle') == '42' ? 'selected' : '' }}>42</option>
                        </select>
                    </div>

                    <div>
                        <label for="precio" class="block text-xs font-bold uppercase tracking-wider text-gray-600 mb-1.5">Precio Máximo ($)</label>
                        <input type="number" id="precio" name="precio" value="{{ request('precio', 90000) }}" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent p-3 outline-none transition">
                    </div>

                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-black font-black py-3 px-4 rounded-xl text-sm transition shadow-lg shadow-orange-500/20 active:scale-95">
                        Aplicar Filtros
                    </button>
                </form>
            </aside>

<!-- GRILLA DE 2 COLUMNAS CON TUS NOMBRES EXACTOS DE ARCHIVO -->
<section class="lg:col-span-3">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-black text-gray-900 tracking-tight">Catálogo de Zapatillas</h1>
            <p class="text-xs text-gray-500">Vista en 2 columnas</p>
        </div>
        <span class="text-xs font-bold bg-white px-3 py-1.5 rounded-full border border-gray-200 shadow-sm text-gray-600">
            6 Productos
        </span>
    </div>

    <!-- CONTENEDOR EN 2 COLUMNAS (IZQUIERDA Y DERECHA) -->
    <div class="grid grid-cols-2 gap-4">

        <!-- 1. PRODUCTOS DE BASE DE DATOS -->
        @foreach($productos ?? [] as $producto)
            <article class="bg-white rounded-xl border border-gray-200/80 shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex flex-col justify-between group">
                <div>
                    <div class="bg-gray-50 h-36 overflow-hidden relative flex items-center justify-center p-2">
                        @if(!empty($producto->imagen))
                            <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                 alt="{{ $producto->nombre }}" 
                                 class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                        @else
                            <img src="{{ asset('zapatillas/adidas.jpeg') }}" 
                                 alt="{{ $producto->nombre }}" 
                                 class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                        @endif

                        <span class="absolute top-2 right-2 bg-emerald-100 text-emerald-800 text-[9px] font-black px-2 py-0.5 rounded-full uppercase">
                            Disponible
                        </span>
                    </div>
                    <div class="p-3">
                        <p class="text-[10px] uppercase tracking-widest text-orange-500 font-black">
                            {{ $producto->marca->nombre ?? 'MARCA' }}
                        </p>
                        <h3 class="font-bold text-gray-900 text-sm mt-0.5 leading-tight truncate">
                            {{ $producto->nombre }}
                        </h3>
                        <p class="text-xs text-gray-500 mt-1">Talle: {{ $producto->talle ?? 'N/A' }}</p>
                        <p class="text-lg font-black text-gray-900 mt-2">
                            $ {{ number_format($producto->precio, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
                <div class="px-3 pb-3">
                    <a href="{{ route('productos.show', $producto->id) }}" class="block w-full text-center bg-black hover:bg-orange-500 hover:text-black text-white font-bold py-1.5 rounded-lg text-xs transition duration-200">
                        Ver Detalle
                    </a>
                </div>
            </article>
        @endforeach

        <!-- 2. TUS 6 IMÁGENES REALES EN PUBLIC/ZAPATILLAS/ -->

        <!-- ZAPATILLA 1: adidas.jpeg -->
        <article class="bg-white rounded-xl border border-gray-200/80 shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex flex-col justify-between group">
            <div>
                <div class="bg-gray-50 h-36 overflow-hidden relative flex items-center justify-center p-2">
                    <img src="{{ asset('zapatillas/adidas.jpeg') }}" alt="Adidas" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                    <span class="absolute top-2 right-2 bg-emerald-100 text-emerald-800 text-[9px] font-black px-2 py-0.5 rounded-full uppercase">Stock: 5</span>
                </div>
                <div class="p-3">
                    <p class="text-[10px] uppercase tracking-widest text-orange-500 font-black">ADIDAS</p>
                    <h3 class="font-bold text-gray-900 text-sm mt-0.5 leading-tight truncate">Grand Court 2.0</h3>
                    <p class="text-xs text-gray-500 mt-1">Talle: 40</p>
                    <p class="text-lg font-black text-gray-900 mt-2">$ 72.000</p>
                </div>
            </div>
            <div class="px-3 pb-3">
                <button class="w-full bg-black hover:bg-orange-500 hover:text-black text-white font-bold py-1.5 rounded-lg text-xs transition">Ver Detalle</button>
            </div>
        </article>

        <!-- ZAPATILLA 2: adidas2.jpeg -->
        <article class="bg-white rounded-xl border border-gray-200/80 shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex flex-col justify-between group">
            <div>
                <div class="bg-gray-50 h-36 overflow-hidden relative flex items-center justify-center p-2">
                    <img src="{{ asset('zapatillas/adidas2.jpeg') }}" alt="Adidas 2" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                    <span class="absolute top-2 right-2 bg-emerald-100 text-emerald-800 text-[9px] font-black px-2 py-0.5 rounded-full uppercase">Stock: 3</span>
                </div>
                <div class="p-3">
                    <p class="text-[10px] uppercase tracking-widest text-orange-500 font-black">ADIDAS</p>
                    <h3 class="font-bold text-gray-900 text-sm mt-0.5 leading-tight truncate">Runfalcon 3.0</h3>
                    <p class="text-xs text-gray-500 mt-1">Talle: 41</p>
                    <p class="text-lg font-black text-gray-900 mt-2">$ 82.000</p>
                </div>
            </div>
            <div class="px-3 pb-3">
                <button class="w-full bg-black hover:bg-orange-500 hover:text-black text-white font-bold py-1.5 rounded-lg text-xs transition">Ver Detalle</button>
            </div>
        </article>

        <!-- ZAPATILLA 3: campus.jpeg -->
        <article class="bg-white rounded-xl border border-gray-200/80 shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex flex-col justify-between group">
            <div>
                <div class="bg-gray-50 h-36 overflow-hidden relative flex items-center justify-center p-2">
                    <img src="{{ asset('zapatillas/campus.jpeg') }}" alt="Campus" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                    <span class="absolute top-2 right-2 bg-emerald-100 text-emerald-800 text-[9px] font-black px-2 py-0.5 rounded-full uppercase">Stock: 4</span>
                </div>
                <div class="p-3">
                    <p class="text-[10px] uppercase tracking-widest text-orange-500 font-black">ADIDAS</p>
                    <h3 class="font-bold text-gray-900 text-sm mt-0.5 leading-tight truncate">Campus 00s</h3>
                    <p class="text-xs text-gray-500 mt-1">Talle: 42</p>
                    <p class="text-lg font-black text-gray-900 mt-2">$ 95.000</p>
                </div>
            </div>
            <div class="px-3 pb-3">
                <button class="w-full bg-black hover:bg-orange-500 hover:text-black text-white font-bold py-1.5 rounded-lg text-xs transition">Ver Detalle</button>
            </div>
        </article>

        <!-- ZAPATILLA 4: images.jpeg -->
        <article class="bg-white rounded-xl border border-gray-200/80 shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex flex-col justify-between group">
            <div>
                <div class="bg-gray-50 h-36 overflow-hidden relative flex items-center justify-center p-2">
                    <img src="{{ asset('zapatillas/images.jpeg') }}" alt="Urban Mix" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                    <span class="absolute top-2 right-2 bg-emerald-100 text-emerald-800 text-[9px] font-black px-2 py-0.5 rounded-full uppercase">Stock: 8</span>
                </div>
                <div class="p-3">
                    <p class="text-[10px] uppercase tracking-widest text-orange-500 font-black">PUMA</p>
                    <h3 class="font-bold text-gray-900 text-sm mt-0.5 leading-tight truncate">Smash v2</h3>
                    <p class="text-xs text-gray-500 mt-1">Talle: 39</p>
                    <p class="text-lg font-black text-gray-900 mt-2">$ 68.000</p>
                </div>
            </div>
            <div class="px-3 pb-3">
                <button class="w-full bg-black hover:bg-orange-500 hover:text-black text-white font-bold py-1.5 rounded-lg text-xs transition">Ver Detalle</button>
            </div>
        </article>

        <!-- ZAPATILLA 5: nike.jpeg -->
        <article class="bg-white rounded-xl border border-gray-200/80 shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex flex-col justify-between group">
            <div>
                <div class="bg-gray-50 h-36 overflow-hidden relative flex items-center justify-center p-2">
                    <img src="{{ asset('zapatillas/nike.jpeg') }}" alt="Nike" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                    <span class="absolute top-2 right-2 bg-emerald-100 text-emerald-800 text-[9px] font-black px-2 py-0.5 rounded-full uppercase">Stock: 6</span>
                </div>
                <div class="p-3">
                    <p class="text-[10px] uppercase tracking-widest text-orange-500 font-black">NIKE</p>
                    <h3 class="font-bold text-gray-900 text-sm mt-0.5 leading-tight truncate">Air Max SC</h3>
                    <p class="text-xs text-gray-500 mt-1">Talle: 41</p>
                    <p class="text-lg font-black text-gray-900 mt-2">$ 85.000</p>
                </div>
            </div>
            <div class="px-3 pb-3">
                <button class="w-full bg-black hover:bg-orange-500 hover:text-black text-white font-bold py-1.5 rounded-lg text-xs transition">Ver Detalle</button>
            </div>
        </article>

        <!-- ZAPATILLA 6: nike2.jpeg -->
        <article class="bg-white rounded-xl border border-gray-200/80 shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex flex-col justify-between group">
            <div>
                <div class="bg-gray-50 h-36 overflow-hidden relative flex items-center justify-center p-2">
                    <img src="{{ asset('zapatillas/nike2.jpeg') }}" alt="Nike 2" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-300">
                    <span class="absolute top-2 right-2 bg-emerald-100 text-emerald-800 text-[9px] font-black px-2 py-0.5 rounded-full uppercase">Stock: 2</span>
                </div>
                <div class="p-3">
                    <p class="text-[10px] uppercase tracking-widest text-orange-500 font-black">NIKE</p>
                    <h3 class="font-bold text-gray-900 text-sm mt-0.5 leading-tight truncate">Revolution 6</h3>
                    <p class="text-xs text-gray-500 mt-1">Talle: 42</p>
                    <p class="text-lg font-black text-gray-900 mt-2">$ 80.000</p>
                </div>
            </div>
            <div class="px-3 pb-3">
                <button class="w-full bg-black hover:bg-orange-500 hover:text-black text-white font-bold py-1.5 rounded-lg text-xs transition">Ver Detalle</button>
            </div>
        </article>

    </div>
</section>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-black text-gray-400 text-xs text-center py-6 border-t border-gray-800">
        © 2026 <span class="text-white font-bold">UrbanShoes</span> - Envíos exclusivos en Posadas y Garupá
    </footer>

</body>
</html>