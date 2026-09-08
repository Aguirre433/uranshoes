```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UrbanShoes | Zapatillas</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900 font-sans antialiased">

    <!-- NAVBAR -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="h-20 flex items-center justify-between">

                <!-- LOGO -->
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="bg-black text-white w-10 h-10 rounded-xl flex items-center justify-center text-xl">
                        👟
                    </div>

                    <div>
                        <span class="font-black text-2xl tracking-tight">
                            Urban<span class="text-gray-500">Shoes</span>
                        </span>

                        <p class="text-[10px] uppercase tracking-[0.25em] text-gray-400 -mt-1">
                            Street & Sport
                        </p>
                    </div>
                </a>

                <!-- MENU -->
                <nav class="hidden md:flex items-center gap-8">

                    <a href="{{ url('/') }}"
                       class="text-sm font-semibold text-gray-900 hover:text-gray-500 transition">
                        Inicio
                    </a>

                    <a href="#productos"
                       class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition">
                        Zapatillas
                    </a>

                    <a href="#categorias"
                       class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition">
                        Categorías
                    </a>

                    <a href="#ofertas"
                       class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition">
                        Ofertas
                    </a>

                </nav>

                <!-- ACCIONES -->
                <div class="flex items-center gap-3">

                    <!-- Carrito -->
                    <button class="hidden sm:flex w-10 h-10 rounded-full bg-gray-100 items-center justify-center hover:bg-gray-200 transition">
                        🛒
                    </button>

                    @if (Route::has('login'))

                        @auth

                            <a href="{{ url('/dashboard') }}"
                               class="bg-black text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-800 transition">
                                Mi cuenta
                            </a>

                        @else

                            <a href="{{ route('login') }}"
                               class="text-sm font-bold text-gray-700 hover:text-black transition">
                                Ingresar
                            </a>

                            @if (Route::has('register'))

                                <a href="{{ route('register') }}"
                                   class="bg-black text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-800 transition">
                                    Registrarse
                                </a>

                            @endif

                        @endauth

                    @endif

                </div>

            </div>

        </div>
    </header>


    <!-- HERO -->
    <section class="bg-gray-100 overflow-hidden">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid lg:grid-cols-2 items-center min-h-[600px] py-16 lg:py-20">

                <!-- TEXTO -->
                <div class="max-w-xl">

                    <p class="uppercase tracking-[0.3em] text-sm font-bold text-gray-500 mb-5">
                        Nueva colección
                    </p>

                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-none">
                        TU ESTILO.
                        <br>
                        <span class="text-gray-500">TUS ZAPAS.</span>
                    </h1>

                    <p class="mt-7 text-lg text-gray-600 leading-relaxed max-w-lg">
                        Descubrí nuestra colección de zapatillas urbanas,
                        deportivas y casuales. Encontrá el modelo que representa tu estilo.
                    </p>

                    <div class="mt-9 flex flex-wrap gap-4">

                        <a href="#productos"
                           class="bg-black text-white px-7 py-4 rounded-xl font-bold hover:bg-gray-800 transition">
                            Ver zapatillas
                        </a>

                        <a href="#categorias"
                           class="bg-white text-gray-900 px-7 py-4 rounded-xl font-bold border border-gray-300 hover:bg-gray-50 transition">
                            Explorar categorías
                        </a>

                    </div>

                </div>


                <!-- IMAGEN / PRODUCTO DESTACADO -->
                <div class="relative mt-12 lg:mt-0">

                    <div class="bg-white rounded-3xl p-8 shadow-xl rotate-2">

                        <div class="aspect-square bg-gray-100 rounded-2xl flex items-center justify-center">

                            <div class="text-center">

                                <div class="text-8xl mb-6">
                                    👟
                                </div>

                                <p class="text-sm uppercase tracking-widest text-gray-400 font-bold">
                                    UrbanShoes
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- ETIQUETA -->
                    <div class="absolute -bottom-5 -left-5 bg-black text-white px-6 py-4 rounded-2xl shadow-lg">
                        <p class="text-xs text-gray-400 uppercase tracking-wider">
                            Desde
                        </p>

                        <p class="text-xl font-black">
                            $89.999
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- CATEGORIAS -->
    <section id="categorias" class="py-20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-end justify-between mb-10">

                <div>
                    <p class="text-sm uppercase tracking-widest font-bold text-gray-400">
                        Explorá
                    </p>

                    <h2 class="text-3xl sm:text-4xl font-black mt-2">
                        Categorías
                    </h2>
                </div>

            </div>


            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

                <div class="group bg-gray-100 rounded-2xl p-7 hover:bg-black hover:text-white transition cursor-pointer">
                    <div class="text-4xl mb-8">🏃</div>

                    <h3 class="text-xl font-black">
                        Running
                    </h3>

                    <p class="text-sm text-gray-500 group-hover:text-gray-400 mt-2">
                        Rendimiento y comodidad
                    </p>
                </div>


                <div class="group bg-gray-100 rounded-2xl p-7 hover:bg-black hover:text-white transition cursor-pointer">
                    <div class="text-4xl mb-8">🏀</div>

                    <h3 class="text-xl font-black">
                        Deportivas
                    </h3>

                    <p class="text-sm text-gray-500 group-hover:text-gray-400 mt-2">
                        Para superar tus límites
                    </p>
                </div>


                <div class="group bg-gray-100 rounded-2xl p-7 hover:bg-black hover:text-white transition cursor-pointer">
                    <div class="text-4xl mb-8">👟</div>

                    <h3 class="text-xl font-black">
                        Urbanas
                    </h3>

                    <p class="text-sm text-gray-500 group-hover:text-gray-400 mt-2">
                        Estilo para todos los días
                    </p>
                </div>


                <div class="group bg-gray-100 rounded-2xl p-7 hover:bg-black hover:text-white transition cursor-pointer">
                    <div class="text-4xl mb-8">✨</div>

                    <h3 class="text-xl font-black">
                        Casual
                    </h3>

                    <p class="text-sm text-gray-500 group-hover:text-gray-400 mt-2">
                        Comodidad y estilo
                    </p>
                </div>

            </div>

        </div>

    </section>


    <!-- PRODUCTOS -->
    <section id="productos" class="py-20 bg-gray-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-end justify-between mb-10">

                <div>
                    <p class="text-sm uppercase tracking-widest font-bold text-gray-400">
                        Selección UrbanShoes
                    </p>

                    <h2 class="text-3xl sm:text-4xl font-black mt-2">
                        Productos destacados
                    </h2>
                </div>

                <a href="#productos"
                   class="hidden sm:block text-sm font-bold underline underline-offset-4">
                    Ver todos
                </a>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">


                <!-- PRODUCTO 1 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-200 group">

                    <div class="aspect-square bg-gray-100 flex items-center justify-center relative">

                        <span class="absolute top-4 left-4 bg-black text-white text-xs font-bold px-3 py-1.5 rounded-full">
                            DESTACADO
                        </span>

                        <span class="text-7xl group-hover:scale-110 transition duration-300">
                            👟
                        </span>

                    </div>

                    <div class="p-5">

                        <p class="text-xs uppercase tracking-wider text-gray-400 font-bold">
                            Nike
                        </p>

                        <h3 class="font-black text-lg mt-1">
                            Air Max Urban
                        </h3>

                        <div class="flex items-center justify-between mt-5">

                            <span class="font-black text-xl">
                                $129.999
                            </span>

                            <button class="bg-black text-white w-10 h-10 rounded-full hover:bg-gray-800 transition">
                                +
                            </button>

                        </div>

                    </div>

                </article>


                <!-- PRODUCTO 2 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-200 group">

                    <div class="aspect-square bg-gray-100 flex items-center justify-center relative">

                        <span class="absolute top-4 left-4 bg-white text-black text-xs font-bold px-3 py-1.5 rounded-full">
                            NUEVO
                        </span>

                        <span class="text-7xl group-hover:scale-110 transition duration-300">
                            👟
                        </span>

                    </div>

                    <div class="p-5">

                        <p class="text-xs uppercase tracking-wider text-gray-400 font-bold">
                            Adidas
                        </p>

                        <h3 class="font-black text-lg mt-1">
                            Forum Street
                        </h3>

                        <div class="flex items-center justify-between mt-5">

                            <span class="font-black text-xl">
                                $109.999
                            </span>

                            <button class="bg-black text-white w-10 h-10 rounded-full hover:bg-gray-800 transition">
                                +
                            </button>

                        </div>

                    </div>

                </article>


                <!-- PRODUCTO 3 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-200 group">

                    <div class="aspect-square bg-gray-100 flex items-center justify-center">

                        <span class="text-7xl group-hover:scale-110 transition duration-300">
                            👟
                        </span>

                    </div>

                    <div class="p-5">

                        <p class="text-xs uppercase tracking-wider text-gray-400 font-bold">
                            Puma
                        </p>

                        <h3 class="font-black text-lg mt-1">
                            Suede Classic
                        </h3>

                        <div class="flex items-center justify-between mt-5">

                            <span class="font-black text-xl">
                                $94.999
                            </span>

                            <button class="bg-black text-white w-10 h-10 rounded-full hover:bg-gray-800 transition">
                                +
                            </button>

                        </div>

                    </div>

                </article>


                <!-- PRODUCTO 4 -->
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-200 group">

                    <div class="aspect-square bg-gray-100 flex items-center justify-center">

                        <span class="text-7xl group-hover:scale-110 transition duration-300">
                            👟
                        </span>

                    </div>

                    <div class="p-5">

                        <p class="text-xs uppercase tracking-wider text-gray-400 font-bold">
                            New Balance
                        </p>

                        <h3 class="font-black text-lg mt-1">
                            574 Classic
                        </h3>

                        <div class="flex items-center justify-between mt-5">

                            <span class="font-black text-xl">
                                $119.999
                            </span>

                            <button class="bg-black text-white w-10 h-10 rounded-full hover:bg-gray-800 transition">
                                +
                            </button>

                        </div>

                    </div>

                </article>

            </div>

        </div>

    </section>


    <!-- OFERTA -->
    <section id="ofertas" class="py-20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-black text-white rounded-3xl overflow-hidden">

                <div class="px-8 py-16 sm:px-16 text-center">

                    <p class="text-sm uppercase tracking-[0.3em] text-gray-400 font-bold">
                        UrbanShoes
                    </p>

                    <h2 class="text-4xl sm:text-5xl font-black mt-4">
                        Tu próximo par está acá.
                    </h2>

                    <p class="text-gray-400 mt-5 max-w-xl mx-auto">
                        Explorá nuestra colección y encontrá las zapatillas
                        que mejor se adapten a tu estilo.
                    </p>

                    <a href="#productos"
                       class="inline-block mt-8 bg-white text-black px-8 py-4 rounded-xl font-black hover:bg-gray-200 transition">
                        Explorar colección
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer class="bg-gray-950 text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <div class="flex flex-col md:flex-row justify-between gap-8">

                <div>

                    <div class="flex items-center gap-3">

                        <div class="bg-white text-black w-10 h-10 rounded-xl flex items-center justify-center">
                            👟
                        </div>

                        <span class="font-black text-2xl">
                            UrbanShoes
                        </span>

                    </div>

                    <p class="text-gray-500 text-sm mt-4 max-w-sm">
                        Zapatillas, estilo y comodidad.
                        Todo lo que necesitás para completar tu look.
                    </p>

                </div>


                <div class="text-sm text-gray-500">

                    <p>
                        © {{ date('Y') }} UrbanShoes.
                    </p>

                    <p class="mt-1">
                        Todos los derechos reservados.
                    </p>

                </div>

            </div>

        </div>

    </footer>

</body>
</html>
```
