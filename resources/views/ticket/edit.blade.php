<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-500 text-white py-6 shadow-lg rounded-md">
            <h2 class="text-3xl font-extrabold text-center uppercase tracking-wide">
                {{ __('Editar Ticket') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-white py-5 text-center">
                    <h3 class="text-xl font-semibold uppercase">{{ __('Modifica los detalles del ticket') }}</h3>
                </div>
                <div class="p-8 text-gray-700">
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

                        <!-- Estado del Ticket -->
                        <div class="mb-6">
                            <x-input-label for="status" :value="__('Estado del Ticket')" />
                            <select id="status" name="status" class="block mt-2 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900"  @if(!Auth::user()->is_admin && !Auth::user()->isTechnician()) disabled @endif>
                                @foreach(App\Enums\TicketStatus::cases() as $status)
                                    <option value="{{ $status->value }}" {{ $ticket->status->value == $status->value ? 'selected' : '' }}>{{ $status->value }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        @if(!Auth::user()->is_admin && !Auth::user()->isTechnician())
                            <!-- Campo Oculto para Estado del Ticket -->
                            <input type="hidden" name="status" value="{{ $ticket->status->value }}">
                        @endif

                        <!-- Técnico Asignado -->
                        <div class="mb-6">
                            <x-input-label for="technician_id" :value="__('Técnico Asignado')" />
                            <select id="technician_id" name="technician_id" class="block mt-2 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900" @if(!Auth::user()->is_admin) disabled @endif>
                                <option value="">No asignado</option>
                                @foreach($technicians as $id => $name)
                                    <option value="{{ $id }}" {{ $ticket->technician_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('technician_id')" class="mt-2" />
                        </div>

                        @if(!Auth::user()->is_admin)
                            <!-- Campo Oculto para Técnico Asignado -->
                            <input type="hidden" name="technician_id" value="{{ $ticket->technician_id }}">
                        @endif

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