<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UrbanShoes | Iniciar Sesión</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f3f4f6] text-gray-900 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- HEADER / NAVBAR -->
    <header class="bg-[#111111] text-white py-4 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-xl font-black tracking-tight text-white hover:opacity-90">
                Urban<span class="text-orange-500">Shoes</span>
            </a>

            <nav class="flex items-center gap-6 text-sm font-semibold">
                <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Inicio</a>
                <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Catálogo</a>
                <a href="{{ route('login') }}" class="text-orange-500 font-bold border-b-2 border-orange-500 pb-0.5">Ingresar</a>
            </nav>
        </div>
    </header>

    <!-- FORMULARIO LOGIN DE ALTO IMPACTO VISUAL -->
    <main class="flex-1 flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-2xl border border-gray-200/80 shadow-xl overflow-hidden p-8">
            
            <div class="text-center mb-6">
                <div class="inline-flex bg-orange-100 text-orange-600 p-3 rounded-2xl mb-3">
                    👟
                </div>
                <h1 class="text-2xl font-black text-gray-900 tracking-tight">Iniciar Sesión</h1>
                <p class="text-xs text-gray-500 mt-1">Accede a tu cuenta para administrar el sistema</p>
            </div>

            <!-- Estado de Sesión -->
            @if (session('status'))
                <div class="mb-4 text-xs font-bold text-green-600 bg-green-50 p-3 rounded-xl border border-green-200 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <!-- ERRORES DE VALIDACIÓN -->
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-xl">
                    <p class="text-xs font-bold text-red-600">Compruebe los datos ingresados:</p>
                    <ul class="mt-1 text-xs text-red-500 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- CORREO ELECTRÓNICO -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                        Correo Electrónico *
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent p-3 outline-none transition"
                           placeholder="tuemail@ejemplo.com">
                </div>

                <!-- CONTRASEÑA -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                        Contraseña *
                    </label>
                    <input id="password" type="password" name="password" required
                           class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent p-3 outline-none transition"
                           placeholder="••••••••">
                </div>

                <!-- RECORDAR SESIÓN -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                        <span class="text-gray-600 font-medium">Recordarme</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs font-bold text-orange-500 hover:underline">
                            ¿Olvidaste tu clave?
                        </a>
                    @endif
                </div>

                <!-- BOTÓN SUBMIT -->
                <button type="submit" 
                        class="w-full bg-orange-500 hover:bg-orange-600 text-black font-black py-3 px-4 rounded-xl text-sm transition shadow-lg shadow-orange-500/20 active:scale-95 mt-2">
                    Iniciar Sesión
                </button>
            </form>

            @if (Route::has('register'))
                <div class="text-center mt-6 pt-4 border-t border-gray-100">
                    <p class="text-xs text-gray-500">
                        ¿No tienes una cuenta? 
                        <a href="{{ route('register') }}" class="text-orange-500 font-bold hover:underline">Regístrate aquí</a>
                    </p>
                </div>
            @endif

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#111111] text-gray-400 text-xs text-center py-4 border-t border-gray-800">
        © 2026 UrbanShoes - Envíos exclusivos en Posadas y Garupá
    </footer>

</body>
</html>