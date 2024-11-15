<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard de Administrador') }}
        </h2>
    </x-slot>
    <script src="https://app.sendstrap.com/scripts/js/social_button.js?id=4231&key=YQwlVpDoD3Kh4g9Va8YLemxoT8LRbjdMj0dpzB5P"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold">{{ __("Bienvenido,") }} {{ Auth::user()->name }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Aquí tienes un acceso rápido a tus tareas más frecuentes.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">

                    <!-- Tarjeta de Ver Tickets -->
                    <div class="bg-gradient-to-r from-white via-white to-blue-500 dark:from-gray-800 dark:via-gray-800 dark:to-blue-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <a href="{{ route('ticket.index') }}" class="block text-blue-900 dark:text-blue-300">
                            <h3 class="text-xl font-semibold mb-2">Ver Tickets</h3>
                            <p class="text-sm">Consulta todos los tickets disponibles y mantente al tanto de su progreso.</p>
                        </a>
                    </div>

                    <!-- Tarjeta de Crear Tickets -->
                    <div class="bg-gradient-to-r from-white via-white to-green-500 dark:from-gray-800 dark:via-gray-800 dark:to-green-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <a href="{{ route('ticket.create') }}" class="block text-green-900 dark:text-green-300">
                            <h3 class="text-xl font-semibold mb-2">Crear Tickets</h3>
                            <p class="text-sm">Genera un nuevo ticket para solicitar soporte.</p>
                        </a>
                    </div>

                    <!-- Tarjeta de Gestionar Categorías -->
                    @if (Auth::user()->isAdmin())
                    <div class="bg-gradient-to-r from-white via-white to-purple-500 dark:from-gray-800 dark:via-gray-800 dark:to-purple-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <h3 class="text-xl font-semibold mb-2 text-purple-900 dark:text-purple-300">Agregar Categoría</h3>
                        <form method="POST" action="{{ route('admin.categories.store') }}">
                            @csrf
                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Nombre de la Categoría')" class="text-purple-900 dark:text-purple-300" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 dark:text-red-400" />
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-3 bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 dark:from-purple-700 dark:via-purple-800 dark:to-purple-900 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                                    {{ __('Agregar Categoría') }}
                                </x-primary-button>
                            </div>
                        </form>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.categories.index') }}" class="ml-3 bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 dark:from-purple-700 dark:via-purple-800 dark:to-purple-900 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                                {{ __('Ver Categorías') }}
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- Tarjeta de Administrar Usuarios -->
                    @if (Auth::user()->isAdmin())
                    <div class="bg-gradient-to-r from-white via-white to-red-500 dark:from-gray-800 dark:via-gray-800 dark:to-red-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <a href="{{ route('admin.users.index') }}" class="block text-red-900 dark:text-red-300">
                            <h3 class="text-xl font-semibold mb-2">Administrar Usuarios</h3>
                            <p class="text-sm">Gestiona los usuarios y asigna roles de administrador.</p>
                        </a>
                    </div>
                    @endif

                    <!-- Tarjeta de Generar Reporte PDF -->
                    @if (Auth::user()->isAdmin())
                    <div class="bg-gradient-to-r from-white via-white to-yellow-500 dark:from-gray-800 dark:via-gray-800 dark:to-yellow-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                        <h3 class="text-xl font-semibold mb-2 text-yellow-900 dark:text-yellow-300">Generar Reporte PDF</h3>
                        <p class="text-sm text-yellow-900 dark:text-yellow-300 mb-4">Genera o previsualiza un reporte PDF de todos los tickets creados.</p>
                        <div class="flex justify-between space-x-4">
                            <a href="{{ route('tickets.pdf') }}" class="bg-gradient-to-r from-red-500 via-red-600 to-red-700 dark:from-red-700 dark:via-red-800 dark:to-red-900 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                                Generar PDF
                            </a>
                            <a href="{{ route('tickets.pdf.preview') }}" class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 dark:from-blue-700 dark:via-blue-800 dark:to-blue-900 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                                Previsualizar PDF
                            </a>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
