<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">{{ __("Bienvenido,") }} {{ Auth::user()->name }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Aquí tienes un acceso rápido a tus tareas más frecuentes.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">

                    <!-- Tarjeta de Ver Tickets -->
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <a href="{{ route('ticket.index') }}" class="block text-white">
                            <h3 class="text-xl font-semibold mb-2">Ver Tickets</h3>
                            <p class="text-sm">Consulta todos los tickets disponibles y mantente al tanto de su progreso.</p>
                        </a>
                    </div>

                    <!-- Tarjeta de Crear Tickets -->
                    <div class="bg-gradient-to-r from-green-500 to-teal-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <a href="{{ route('ticket.create') }}" class="block text-white">
                            <h3 class="text-xl font-semibold mb-2">Crear Tickets</h3>
                            <p class="text-sm">Genera un nuevo ticket para solicitar soporte.</p>
                        </a>
                    </div>

                    <!-- Tarjeta de Administrar Usuarios -->
                    @if (Auth::user()->is_admin)
                    <div class="bg-gradient-to-r from-red-500 to-pink-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <a href="{{ route('admin.users.index') }}" class="block text-white">
                            <h3 class="text-xl font-semibold mb-2">Administrar Usuarios</h3>
                            <p class="text-sm">Gestiona los usuarios y asigna roles de administrador.</p>
                        </a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
