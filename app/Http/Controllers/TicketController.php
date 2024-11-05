<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Filtrar los tickets según el rol del usuario
        if ($user->is_admin) {
            $tickets = Ticket::all();
        } else {
            $tickets = Ticket::where('user_id', $user->id)->get();
        }

        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar y crear el ticket
        $ticket = Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        // Manejar el archivo adjunto
        if ($request->file('attachment')) {
            $ticket->attachment = $this->storeAttachment($request, $ticket);
            $ticket->save();
        }

        // Redirigir a la página de índice de tickets
        return redirect()->route('ticket.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $user = Auth::user();

        // Verificar si el usuario es el creador del ticket o un administrador
        if ($user->id !== $ticket->user_id && !$user->is_admin) {
            // Redirigir o mostrar un mensaje de error
            return redirect()->route('ticket.index')->with('error', 'No tienes permiso para ver este ticket.');
        }

        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->except('attachment'));

        if ($request->file('attachment')) {
            // Verifica si el ticket tiene un archivo adjunto antes de intentar eliminarlo
            if ($ticket->attachment) {
                Storage::disk('public')->delete($ticket->attachment);
            }
            $ticket->attachment = $this->storeAttachment($request, $ticket);
            $ticket->save();
        }

        return redirect()->route('ticket.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('ticket.index');
    }

    protected function storeAttachment($request, $ticket)
    {
        $ext = $request->file('attachment')->extension();
        $filename = Str::random(25) . '.' . $ext;
        $path = $request->file('attachment')->storeAs('attachments', $filename, 'public');
        return $path;
    }
}
