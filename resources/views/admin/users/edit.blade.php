<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <div class="p-8 bg-gray-900 text-gray-100">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Nombre -->
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" class="text-gray-300" />
                            <x-text-input
                                id="name"
                                class="block mt-1 w-full bg-gray-700 border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500"
                                type="text"
                                name="name"
                                value="{{ $user->name }}"
                                required
                                autofocus
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                        </div>

                        <!-- Correo Electrónico -->
                        <div>
                            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-gray-300" />
                            <x-text-input
                                id="email"
                                class="block mt-1 w-full bg-gray-700 border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500"
                                type="email"
                                name="email"
                                value="{{ $user->email }}"
                                required
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                        </div>

                        <!-- Rol -->
                        <div>
                            <x-input-label for="role" :value="__('Rol')" class="text-gray-300" />
                            <select
                                id="role"
                                name="role"
                                class="block mt-1 w-full bg-gray-700 border-gray-600 text-white focus:border-blue-500 focus:ring-blue-500 rounded-md"
                            >
                                @foreach($roles as $value => $label)
                                    <option value="{{ $value }}" {{ $user->role == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-400" />
                        </div>

                        <!-- Botón de Actualizar -->
                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 transition duration-150 ease-in-out rounded-md">
                                {{ __('Actualizar Usuario') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
