<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-gray-900 p-8 rounded-lg shadow-md">
        @csrf

        <h2 class="text-2xl font-semibold text-white text-center mb-6">Iniciar Sesión</h2>

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
                autofocus
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
                autocomplete="current-password"
                placeholder="Ingresa tu contraseña"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="block mb-4">
            <label for="remember_me" class="inline-flex items-center text-gray-300">
                <input id="remember_me" type="checkbox" class="rounded border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mb-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-400 hover:text-gray-300" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="bg-indigo-600 hover:bg-indigo-500 text-white rounded px-4 py-2">
                {{ __('Iniciar sesión') }}
            </x-primary-button>
        </div>

        <!-- Botón de Iniciar Sesión con Google -->
        <div class="flex items-center justify-center mt-4">
            <a href="{{ route('auth.google') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                {{ __('Iniciar sesión con Google') }}
            </a>
        </div>
    </form>
</x-guest-layout>
