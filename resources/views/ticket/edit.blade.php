<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

        <!-- Encabezado del Formulario -->
        <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-400 mb-6">✏️ Editar Ticket</h1>

        <!-- Tarjeta del Formulario -->
        <div class="w-full sm:max-w-xl px-8 py-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <form method="POST" action="{{ route('ticket.update', $ticket->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Campo de Título -->
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Titulo')" class="text-gray-800 dark:text-gray-100" />
                    <x-text-input id="title" class="block mt-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500" type="text" name="title" value="{{ $ticket->title }}" autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2 text-red-600" />
                </div>

                <!-- Campo de Descripción -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Descripción')" class="text-gray-800 dark:text-gray-100" />
                    <textarea id="description" name="description" class="form-textarea block w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500">{{ $ticket->description }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2 text-red-600" />
                </div>

                <!-- Campo de Categorías -->
                <div class="mt-4">
                    <x-input-label for="category" :value="__('Categoría')" class="text-gray-800 dark:text-gray-100" />
                    <select id="category" name="category" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500">
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}" {{ $ticket->category_id == $id ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category')" class="mt-2 text-red-600" />
                </div>

                <!-- Campo de Urgencia -->
                <div class="mt-4">
                    <x-input-label for="urgency" :value="__('Urgencia')" class="text-gray-800 dark:text-gray-100" />
                    <select id="urgency" name="urgency" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500">
                        <option value="Baja" {{ $ticket->urgency == 'Baja' ? 'selected' : '' }}>Baja</option>
                        <option value="Normal" {{ $ticket->urgency == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="Alta" {{ $ticket->urgency == 'Alta' ? 'selected' : '' }}>Alta</option>
                    </select>
                    <x-input-error :messages="$errors->get('urgency')" class="mt-2 text-red-600" />
                </div>

                <!-- Campo de Adjunto -->
                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Attachment/Adjuntar Archivo (Opcional)')" class="text-gray-800 dark:text-gray-100" />
                    <input type="file" name="attachment" id="attachment" class="block w-full text-gray-800 dark:text-gray-200 border-gray-300 dark:border-gray-700 dark:bg-gray-700 mt-2 px-2 py-2 rounded-lg focus:border-blue-500 focus:ring-blue-500">
                    <x-input-error :messages="$errors->get('attachment')" class="mt-2 text-red-600" />
                </div>

                <!-- Campo de Estado (Editable para Administradores, Oculto para Usuarios Comunes) -->
                @if (Auth::user()->is_admin)
                    <div class="mt-4">
                        <x-input-label for="status" :value="__('Estado')" class="text-gray-800 dark:text-gray-100" />
                        <select id="status" name="status" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500">
                            <option value="Abierto" {{ $ticket->status == 'Abierto' ? 'selected' : '' }}>Abierto</option>
                            <option value="Resuelto" {{ $ticket->status == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
                            <option value="Rechazado" {{ $ticket->status == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2 text-red-600" />
                    </div>
                @else
                    <input type="hidden" name="status" value="{{ $ticket->status }}">
                @endif

                <!-- Botón de Envío -->
                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-lg hover:bg-blue-500 transition-colors duration-200 transform hover:scale-105">
                        Actualizar Ticket
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
