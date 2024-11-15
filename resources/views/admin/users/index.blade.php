<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold text-white mb-4">Gestión de Usuarios</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-900 border border-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="py-3 px-4 border-b text-left text-gray-300 font-semibold">Nombre</th>
                            <th class="py-3 px-4 border-b text-left text-gray-300 font-semibold">Correo</th>
                            <th class="py-3 px-4 border-b text-left text-gray-300 font-semibold">Rol</th>
                            <th class="py-3 px-4 border-b text-left text-gray-300 font-semibold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-700 transition duration-200">
                                <td class="py-3 px-4 border-b border-gray-600 text-gray-300">{{ $user->name }}</td>
                                <td class="py-3 px-4 border-b border-gray-600 text-gray-300">{{ $user->email }}</td>
                                <td class="py-3 px-4 border-b border-gray-600">
                                    @if($user->isAdmin())
                                        <span class="bg-blue-600 text-white py-1 px-3 rounded-full text-sm font-semibold">Administrador</span>
                                    @elseif($user->isTechnician())
                                        <span class="bg-green-600 text-white py-1 px-3 rounded-full text-sm font-semibold">Técnico</span>
                                    @else
                                        <span class="bg-gray-600 text-white py-1 px-3 rounded-full text-sm font-semibold">Usuario</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 border-b border-gray-600 flex space-x-4">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">Editar</a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition duration-200">Eliminar</button>
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
