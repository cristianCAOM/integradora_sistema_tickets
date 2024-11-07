<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 py-6 sm:py-12">
        <div class="w-full sm:max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 space-y-6">
            <!-- Título -->
            <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100">Agregar Categoría</h1>

            <!-- Formulario de Agregar Categoría -->
            <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">
                @csrf
                <!-- Campo de Nombre de la Categoría -->
                <div>
                    <x-input-label for="name" :value="__('Nombre de la Categoría')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Botón para Agregar Categoría -->
                <div class="flex items-center justify-center">
                    <x-primary-button class="w-full py-3">
                        {{ __('Agregar Categoría') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
