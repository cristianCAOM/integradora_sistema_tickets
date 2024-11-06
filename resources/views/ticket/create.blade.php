<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

        <!-- Encabezado del Formulario -->
        <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-400 mb-6">🎫 Crear un Nuevo Ticket</h1>

        <!-- Tarjeta del Formulario -->
        <div class="w-full sm:max-w-xl px-8 py-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Campo de Título -->
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Titulo')" class="text-gray-800 dark:text-gray-100" />
                    <x-text-input id="title" class="block mt-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500" type="text" name="title" placeholder="Enter ticket title" autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2 text-red-600" />
                </div>

                <!-- Campo de Descripción -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Descripción')" class="text-gray-800 dark:text-gray-100" />
                    <textarea id="description" name="description" class="form-textarea block w-full mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500" placeholder="Add description"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2 text-red-600" />
                </div>

                <!-- Campo de Categorías -->
                <div class="mt-4">
                    <x-input-label for="category" :value="__('Categoría')" class="text-gray-800 dark:text-gray-100" />
                    <select id="category" name="category" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Selecciona . . .</option>
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category')" class="mt-2 text-red-600" />
                </div>

                <!-- Campo de Urgencia -->
                <div class="mt-4">
                    <x-input-label for="urgency" :value="__('Urgencia')" class="text-gray-800 dark:text-gray-100" />
                    <select id="urgency" name="urgency" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500">
                        <option value="Baja">Baja</option>
                        <option value="Normal" selected>Normal</option>
                        <option value="Alta">Alta</option>
                    </select>
                    <x-input-error :messages="$errors->get('urgency')" class="mt-2 text-red-600" />
                </div>

                <!-- Campo de Adjunto -->
                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Attachment/Adjuntar Archivo (Opcional)')" class="text-gray-800 dark:text-gray-100" />
                    <input type="file" name="attachment" id="attachment" class="block w-full text-gray-800 dark:text-gray-200 border-gray-300 dark:border-gray-700 dark:bg-gray-700 mt-2 px-2 py-2 rounded-lg focus:border-blue-500 focus:ring-blue-500">
                    <x-input-error :messages="$errors->get('attachment')" class="mt-2 text-red-600" />
                </div>

                <!-- Botón de Envío -->
                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-lg hover:bg-blue-500 transition-colors duration-200 transform hover:scale-105">
                        Crear Ticket
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
