<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto bg-gray-900 p-8 rounded-lg shadow-md">
        @csrf

        <h2 class="text-2xl font-semibold text-white text-center mb-6">Registrarse</h2>

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Nombre')" class="text-gray-300" />
            <x-text-input
                id="name"
                class="block mt-1 w-full p-3 border border-gray-600 bg-gray-800 text-white placeholder-gray-400 rounded focus:outline-none focus:ring focus:ring-indigo-500"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Ingresa tu nombre"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Correo')" class="text-gray-300" />
            <x-text-input
                id="email"
                class="block mt-1 w-full p-3 border border-gray-600 bg-gray-800 text-white placeholder-gray-400 rounded focus:outline-none focus:ring focus:ring-indigo-500"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                placeholder="Ingresa tu email"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-gray-300" />
            <x-text-input
                id="password"
                class="block mt-1 w-full p-3 border border-gray-600 bg-gray-800 text-white placeholder-gray-400 rounded focus:outline-none focus:ring focus:ring-indigo-500"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Ingresa tu contraseña"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirma Contraseña')" class="text-gray-300" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full p-3 border border-gray-600 bg-gray-800 text-white placeholder-gray-400 rounded focus:outline-none focus:ring focus:ring-indigo-500"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Confirma tu contraseña"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-400 hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estas registrado?') }}
            </a>

            <x-primary-button class="bg-indigo-600 hover:bg-indigo-500 text-white rounded px-4 py-2">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
