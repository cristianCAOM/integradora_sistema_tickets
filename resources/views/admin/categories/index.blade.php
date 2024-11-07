<x-app-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-8 flex justify-center">
        <div class="w-full max-w-4xl bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <!-- Encabezado -->
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Categorías</h1>
                <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                    Agregar Categoría
                </a>
            </div>

            <!-- Tabla de Categorías -->
            <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700">
                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 dark:text-gray-300 border-b dark:border-gray-600">ID</th>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 dark:text-gray-300 border-b dark:border-gray-600">Nombre</th>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 dark:text-gray-300 border-b dark:border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-300">
                                <td class="py-4 px-6 border-b dark:border-gray-600 text-gray-800 dark:text-gray-100">{{ $category->id }}</td>
                                <td class="py-4 px-6 border-b dark:border-gray-600 text-gray-800 dark:text-gray-100">{{ $category->name }}</td>
                                <td class="py-4 px-6 border-b dark:border-gray-600 flex space-x-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition duration-300">
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta categoría?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
