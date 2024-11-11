<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('ticket.update', $ticket->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Título -->
                        <div class="mb-6">
                            <x-input-label for="title" :value="__('Título')" />
                            <x-text-input id="title" class="block mt-2 w-full" type="text" name="title" value="{{ $ticket->title }}" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Descripción -->
                        <div class="mb-6">
                            <x-input-label for="description" :value="__('Descripción')" />
                            <textarea id="description" name="description" class="block mt-2 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" rows="4" required>{{ $ticket->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Categoría -->
                        <div class="mb-6">
                            <x-input-label for="category" :value="__('Categoría')" />
                            <select id="category" name="category" class="block mt-2 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                                @foreach($categories as $id => $name)
                                    <option value="{{ $id }}" {{ $ticket->category_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Urgencia -->
                        <div class="mb-6">
                            <x-input-label for="urgency" :value="__('Urgencia')" />
                            <select id="urgency" name="urgency" class="block mt-2 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                                <option value="Baja" {{ $ticket->urgency == 'Baja' ? 'selected' : '' }}>Baja</option>
                                <option value="Normal" {{ $ticket->urgency == 'Normal' ? 'selected' : '' }}>Normal</option>
                                <option value="Alta" {{ $ticket->urgency == 'Alta' ? 'selected' : '' }}>Alta</option>
                            </select>
                            <x-input-error :messages="$errors->get('urgency')" class="mt-2" />
                        </div>

                        <!-- Estado -->
                        <div class="mb-6">
                            <x-input-label for="status" :value="__('Estado')" />
                            <select id="status" name="status" class="block mt-2 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                                <option value="Abierto" {{ $ticket->status == 'Abierto' ? 'selected' : '' }}>Abierto</option>
                                <option value="Resuelto" {{ $ticket->status == 'Resuelto' ? 'selected' : '' }}>Resuelto</option>
                                <option value="Rechazado" {{ $ticket->status == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Técnico Asignado -->
                        <div class="mb-6">
                            <x-input-label for="technician_id" :value="__('Técnico Asignado')" />
                            <select id="technician_id" name="technician_id" class="block mt-2 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                                <option value="">No asignado</option>
                                @foreach($technicians as $id => $name)
                                    <option value="{{ $id }}" {{ $ticket->technician_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('technician_id')" class="mt-2" />
                        </div>

                        <!-- Adjuntar Archivo -->
                        <div class="mb-6">
                            <x-input-label for="attachment" :value="__('Adjuntar Archivo (Opcional)')" />
                            <input type="file" name="attachment" id="attachment" class="block mt-2 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900">
                            <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                        </div>

                        <!-- Botón de Envío -->
                        <div class="flex justify-end">
                            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-200 ease-in-out">
                                {{ __('Actualizar Ticket') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
