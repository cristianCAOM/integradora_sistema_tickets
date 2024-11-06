<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="bg-gray-800 rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold text-white mb-4">Manage Users</h1>

            <div class="overflow-hidden rounded-lg">
                <table class="min-w-full bg-gray-900 border border-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="py-3 px-4 border-b text-left text-gray-300 font-semibold">Name</th>
                            <th class="py-3 px-4 border-b text-left text-gray-300 font-semibold">Email</th>
                            <th class="py-3 px-4 border-b text-left text-gray-300 font-semibold">Admin</th>
                            <th class="py-3 px-4 border-b text-left text-gray-300 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-700 transition duration-200">
                                <td class="py-3 px-4 border-b border-gray-600 text-gray-300">{{ $user->name }}</td>
                                <td class="py-3 px-4 border-b border-gray-600 text-gray-300">{{ $user->email }}</td>
                                <td class="py-3 px-4 border-b border-gray-600 text-gray-300">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                                <td class="py-3 px-4 border-b border-gray-600 flex space-x-4">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition duration-200">Delete</button>
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
