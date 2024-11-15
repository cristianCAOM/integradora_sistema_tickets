<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

        <!-- Encabezado con Título y Botón de Crear -->
        <div class="flex justify-between items-center w-full sm:max-w-xl mb-6 px-6">
            <h1 class="text-3xl font-extrabold text-blue-700 dark:text-blue-400">📄 Tickets de soporte</h1>
            <a href="{{ route('ticket.create') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-lg hover:bg-blue-500 transition-colors duration-200 transform hover:scale-105">
                + Nuevo Ticket
            </a>
        </div>

        <!-- Tarjeta Contenedora de Tickets -->
        <div class="w-full sm:max-w-xl bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            @forelse ($tickets as $ticket)
                <div class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    <div class="flex justify-between items-center px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <span class="text-gray-500 dark:text-gray-400">🎫</span>
                            <a href="{{ route('ticket.show', $ticket->id) }}" class="text-lg font-medium text-gray-800 dark:text-gray-100 hover:underline">
                                {{ $ticket->title }}
                            </a>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $ticket->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @empty
                <div class="px-6 py-4">
                    <p class="text-gray-700 dark:text-gray-300 text-center">No tienes ningún ticket de soporte todavía.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
