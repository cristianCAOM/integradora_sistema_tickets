<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenido") }}
                , {{ Auth::user()->name }}
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <a href="{{ route('ticket.store') }}" class="block text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-semibold mb-2">Ver Tickets</h3>
                            <p>Consulta todos los tickets disponibles.</p>
                        </a>
                    </div>
                    <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <a href="{{ route('ticket.create') }}" class="block text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-semibold mb-2">Crear Tickets</h3>
                            <p>Genera un nuevo ticket.</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>

</x-app-layout>
