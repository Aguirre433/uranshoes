<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

```
    <!-- Nombre de usuario -->
    <div>
        <x-input-label for="nombre_usuario" :value="__('Nombre')" />

        <x-text-input
            id="nombre_usuario"
            class="block mt-1 w-full"
            type="text"
            name="nombre_usuario"
            :value="old('nombre_usuario')"
            required
            autofocus
            autocomplete="name"
        />

        <x-input-error
            :messages="$errors->get('nombre_usuario')"
            class="mt-2"
        />
    </div>

    <!-- Email -->
    <div class="mt-4">
        <x-input-label for="email_usuario" :value="__('Email')" />

        <x-text-input
            id="email_usuario"
            class="block mt-1 w-full"
            type="email"
            name="email_usuario"
            :value="old('email_usuario')"
            required
            autocomplete="username"
        />

        <x-input-error
            :messages="$errors->get('email_usuario')"
            class="mt-2"
        />
    </div>

    <!-- Contraseña -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Contraseña')" />

        <x-text-input
            id="password"
            class="block mt-1 w-full"
            type="password"
            name="password"
            required
            autocomplete="new-password"
        />

        <x-input-error
            :messages="$errors->get('password')"
            class="mt-2"
        />
    </div>

    <!-- Confirmar contraseña -->
    <div class="mt-4">
        <x-input-label
            for="password_confirmation"
            :value="__('Confirmar contraseña')"
        />

        <x-text-input
            id="password_confirmation"
            class="block mt-1 w-full"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
        />

        <x-input-error
            :messages="$errors->get('password_confirmation')"
            class="mt-2"
        />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a
            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('login') }}"
        >
            {{ __('¿Ya estás registrado?') }}
        </a>

        <x-primary-button class="ms-4">
            {{ __('Registrarse') }}
        </x-primary-button>
    </div>
</form>
```

</x-guest-layout>
