<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Perfil del usuario
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
           Agregar o actualizar la imagen de perfil del usuario.
        </p>
    </header>

    @if (session('message'))
    <div class="text-red-500">
        {{ session('message') }}
    </div>
    @endif

    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @method('patch')
        @csrf

        <div>
            <x-input-label for="name" value="Upload Avatar from computer" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"
                autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>


        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>