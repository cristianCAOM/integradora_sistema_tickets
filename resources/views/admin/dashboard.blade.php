<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard de Administrador') }}
        </h2>
    </x-slot>
    <script src="https://app.sendstrap.com/scripts/js/social_button.js?id=4231&key=YQwlVpDoD3Kh4g9Va8YLemxoT8LRbjdMj0dpzB5P"></script>    <div class="py-12">
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

                    <!-- Tarjeta de Gestionar Categorías -->
                    @if (Auth::user()->isAdmin())
                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <h3 class="text-xl font-semibold mb-2 text-white">Agregar Categoría</h3>
                        <form method="POST" action="{{ route('admin.categories.store') }}">
                            @csrf
                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Nombre de la Categoría')" class="text-white" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-3 bg-blue-600 text-white">
                                    {{ __('Agregar Categoría') }}
                                </x-primary-button>
                            </div>
                        </form>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.categories.index') }}" class="ml-3 bg-blue-600 text-white px-4 py-2 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                                {{ __('Ver Categorías') }}
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- Tarjeta de Administrar Usuarios -->
                    @if (Auth::user()->isAdmin())
                    <div class="bg-gradient-to-r from-red-500 to-pink-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <a href="{{ route('admin.users.index') }}" class="block text-white">
                            <h3 class="text-xl font-semibold mb-2">Administrar Usuarios</h3>
                            <p class="text-sm">Gestiona los usuarios y asigna roles de administrador.</p>
                        </a>
                    </div>
                    @endif

                    <!-- Tarjeta de Generar Reporte PDF -->
                    @if (Auth::user()->isAdmin())
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <h3 class="text-xl font-semibold mb-2 text-white">Generar Reporte PDF</h3>
                        <p class="text-sm text-white mb-4">Genera o previsualiza un reporte PDF de todos los tickets creados.</p>
                        <div class="flex justify-between">
                            <a href="{{ route('tickets.pdf') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Generar PDF</a>
                            <a href="{{ route('tickets.pdf.preview') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Previsualizar PDF</a>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
