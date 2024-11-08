<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 py-6 sm:py-12">
        <div class="w-full sm:max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 space-y-6">
            <!-- Título -->
            <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100">Editar Categoría</h1>

            <!-- Formulario de Editar Categoría -->
            <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" class="space-y-4">
                @csrf
                @method('PATCH')
                <!-- Campo de Nombre de la Categoría -->
                <div>
                    <x-input-label for="name" :value="__('Nombre de la Categoría')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $category->name }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

               {{--  <!-- Campo de Descripción de la Categoría -->
                <div>
                    <x-input-label for="description" :value="__('Descripción de la Categoría')" />
                    <textarea id="description" name="description" class="block mt-1 w-full" rows="4">{{ $category->description }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div> --}}

                <!-- Botón para Editar Categoría -->
                <div class="flex items-center justify-center">
                    <x-primary-button class="w-full py-3">
                        {{ __('Actualizar Categoría') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
