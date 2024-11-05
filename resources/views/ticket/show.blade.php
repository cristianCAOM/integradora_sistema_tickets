<x-app-layout>
    <div class="min-h-screen flex flex-col items-center pt-6 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-2xl bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">

            <!-- Encabezado de Ticket -->
            <div class="bg-blue-600 text-white p-6">
                <h1 class="text-2xl font-bold">{{ $ticket->title }}</h1>
                <p class="text-sm mt-1">Creado por {{ $ticket->user->name }} - {{ $ticket->created_at->format('d M, Y') }}</p>
            </div>

            <!-- Contenido del Ticket -->
            <div class="p-6">
                <table class="w-full text-left">
                    <tr class="border-b dark:border-gray-700">
                        <th class="py-4 px-2 text-gray-900 dark:text-gray-100">Descripción</th>
                        <td class="py-4 px-2 text-gray-900 dark:text-gray-100">{{ $ticket->description }}</td>
                    </tr>
                    @if ($ticket->attachment)
                    <tr class="border-b dark:border-gray-700">
                        <th class="py-4 px-2 text-gray-900 dark:text-gray-100">Archivo Adjunto</th>
                        <td class="py-4 px-2">
                            <a href="{{ asset('storage/' . $ticket->attachment) }}" target="_blank" class="text-blue-600 underline">Ver Archivo</a>
                        </td>
                    </tr>
                    @endif
                    <tr class="border-b dark:border-gray-700">
                        <th class="py-4 px-2 text-gray-900 dark:text-gray-100">Estado</th>
                        <td class="py-4 px-2">
                            @if (auth()->user()->is_admin)
                                <form action="{{ route('ticket.update', $ticket->id) }}" method="post" class="flex space-x-2">
                                    @csrf
                                    @method('patch')
                                    <button name="status" value="Abierto" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Abierto</button>
                                    <button name="status" value="Resuelto" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Resuelto</button>
                                    <button name="status" value="Rechazado" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Rechazado</button>
                                </form>
                            @else
                                <span class="px-2 py-1 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded">{{ $ticket->status }}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Botones de Acción -->
            <div class="p-6 bg-gray-100 dark:bg-gray-900 flex justify-end space-x-4">
                <a href="{{ route('ticket.edit', $ticket->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Editar</a>
                <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este ticket?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
