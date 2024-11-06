<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h1 class="text-3xl font-bold text-white mb-6">Edit User</h1>
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
                    <x-text-input id="name" class="block mt-1 w-full p-3 border border-gray-600 bg-gray-700 text-white placeholder-gray-400 rounded focus:outline-none focus:ring focus:ring-indigo-500" type="text" name="name" value="{{ $user->name }}" disabled />
                </div>

                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                    <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-600 bg-gray-700 text-white placeholder-gray-400 rounded focus:outline-none focus:ring focus:ring-indigo-500" type="email" name="email" value="{{ $user->email }}" disabled />
                </div>

                <div class="mb-4 flex items-center">
                    <x-input-label for="is_admin" :value="__('Admin')" class="text-gray-300 mr-2" />
                    <input id="is_admin" type="checkbox" name="is_admin" class="rounded border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ $user->is_admin ? 'checked' : '' }}>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h1 class="text-3xl font-bold text-white mb-6">Edit User</h1>
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
                    <x-text-input id="name" class="block mt-1 w-full p-3 border border-gray-600 bg-gray-700 text-white placeholder-gray-400 rounded focus:outline-none focus:ring focus:ring-indigo-500" type="text" name="name" value="{{ $user->name }}" disabled />
                </div>

                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                    <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-600 bg-gray-700 text-white placeholder-gray-400 rounded focus:outline-none focus:ring focus:ring-indigo-500" type="email" name="email" value="{{ $user->email }}" disabled />
                </div>

                <div class="mb-4 flex items-center">
                    <x-input-label for="is_admin" :value="__('Admin')" class="text-gray-300 mr-2" />
                    <input id="is_admin" type="checkbox" name="is_admin" class="rounded border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ $user->is_admin ? 'checked' : '' }}>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                @csrf
                @method('DELETE')
                <div class="flex items-center justify-end mt-6">
                    <x-danger-button class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                        {{ __('Delete') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
