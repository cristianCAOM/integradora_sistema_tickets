<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-bold">{{ $ticket->title }}</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-white flex justify-between py-4">
                <a href="{{ route('ticket.show', $ticket->id) }}">{{ $ticket->title }}</a>
                <p>{{ $ticket->description }}</p>
                <p>{{ $ticket->created_at->diffForHumans() }}</p>
                @if ($ticket->attachment)
                    <a href="{{ asset('storage/' . $ticket->attachment) }}" target="_blank">Archivo Adjunto</a>
                @endif
            </div>
            <div class="flex justify-between">
                <div class="flex">
                    <a href="{{ route('ticket.edit', $ticket->id) }}">
                        <x-primary-button>Edit</x-primary-button>
                    </a>

                    <form class="ml-2" action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                        @csrf
                        @method('DELETE')
                        <x-primary-button>Delete</x-primary-button>
                    </form>
                </div>
                @if (auth()->user()->isAdmin)
                    <div class="flex">
                        <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="Abierto" />
                            <x-primary-button class="ml-2">Abierto</x-primary-button>
                        </form>

                        <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="Resuelto" />
                            <x-primary-button>Resuelto</x-primary-button>
                        </form>

                        <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="status" value="Rechazado" />
                            <x-primary-button class="ml-2">Rechazado</x-primary-button>
                        </form>
                    </div>
                @else
                    <p class="text-white">Status: {{ $ticket->status }}</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
