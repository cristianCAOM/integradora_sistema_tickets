    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard Usuario') }}
            </h2>
        </x-slot>
        <script src="https://app.sendstrap.com/scripts/js/social_button.js?id=4231&key=YQwlVpDoD3Kh4g9Va8YLemxoT8LRbjdMj0dpzB5P"></script>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-3xl font-bold">{{ __("Bienvenido,") }} {{ Auth::user()->name }}</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Aquí tienes un acceso rápido a tus tareas más frecuentes.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6">

                        <!-- Sección de Ver Tickets -->
                        <div class="bg-gradient-to-r from-white via-white to-indigo-500 dark:from-gray-800 dark:via-gray-800 dark:to-indigo-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                            <a href="{{ route('ticket.index') }}" class="block text-indigo-900 dark:text-indigo-300">
                                <h3 class="text-xl font-semibold mb-2">Ver Tickets</h3>
                                <p class="text-sm">Consulta todos los tickets disponibles y mantente al tanto de su progreso.</p>
                            </a>
                        </div>

                        <!-- Sección de Crear Tickets -->
                        <div class="bg-gradient-to-r from-white via-white to-emerald-500 dark:from-gray-800 dark:via-gray-800 dark:to-emerald-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                            <a href="{{ route('ticket.create') }}" class="block text-emerald-900 dark:text-emerald-300">
                                <h3 class="text-xl font-semibold mb-2">Crear Tickets</h3>
                                <p class="text-sm">Genera un nuevo ticket para solicitar soporte.</p>
                            </a>
                        </div>

                        <!-- Sección de Gestionar Categorías -->
                        @if (Auth::user()->isAdmin())
                        <div class="bg-gradient-to-r from-white via-white to-gray-500 dark:from-gray-800 dark:via-gray-800 dark:to-gray-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-300">Agregar Categoría</h3>
                            <form method="POST" action="{{ route('admin.categories.store') }}">
                                @csrf
                                <div class="mb-4">
                                    <x-input-label for="name" :value="__('Nombre de la Categoría')" class="text-gray-900 dark:text-gray-300" />
                                    <x-text-input id="name" class="block mt-1 w-full p-3 border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 rounded focus:outline-none focus:ring focus:ring-indigo-500" type="text" name="name" required autofocus />
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

                        <!-- Sección de Administrar Usuarios -->
                        @if (Auth::user()->isAdmin())
                        <div class="bg-gradient-to-r from-white via-white to-red-500 dark:from-gray-800 dark:via-gray-800 dark:to-red-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                            <a href="{{ route('admin.users.index') }}" class="block text-red-900 dark:text-red-300">
                                <h3 class="text-xl font-semibold mb-2">Administrar Usuarios</h3>
                                <p class="text-sm">Gestiona los usuarios y asigna roles de administrador.</p>
                            </a>
                        </div>
                        @endif

                        <!-- Sección de Generar Reporte PDF -->
                        @if (Auth::user()->isAdmin())
                        <div class="bg-gradient-to-r from-white via-white to-orange-500 dark:from-gray-800 dark:via-gray-800 dark:to-orange-500 p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform">
                            <h3 class="text-xl font-semibold mb-2 text-orange-900 dark:text-orange-300">Generar Reporte PDF</h3>
                            <p class="text-sm text-orange-900 dark:text-orange-300 mb-4">Genera o previsualiza un reporte PDF de todos los tickets creados.</p>
                            <div class="flex flex-col sm:flex-row justify-between space-y-2 sm:space-y-0 sm:space-x-2">
                                <a href="{{ route('tickets.pdf') }}" class="bg-gradient-to-r from-gray-800 via-gray-900 to-gray-900 dark:from-gray-900 dark:via-gray-900 dark:to-gray-900 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 text-center">Generar PDF</a>
                                <a href="{{ route('tickets.pdf.preview') }}" class="bg-gradient-to-r from-gray-800 via-gray-900 to-gray-900 dark:from-gray-900 dark:via-gray-900 dark:to-gray-900 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 text-center">Previsualizar PDF</a>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
