<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Enums\TicketStatus;
use App\Notifications\TicketCreated;

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
        } elseif ($user->role == 'technician') {
            $tickets = Ticket::where('technician_id', $user->id)->get();
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
        $categories = Category::pluck('name', 'id');
        return view('ticket.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
            'urgency' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx',
        ]);

        $ticket = Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
            'urgency' => $request->urgency,
            'category_id' => $request->category,
            'status' => TicketStatus::OPEN,
        ]);

        if ($request->file('attachment')) {
            $ticket->attachment = $this->storeAttachment($request, $ticket);
            $ticket->save();
        }

        // Enviar notificación al usuario autenticado
        $user = auth()->user();
        $user->notify(new TicketCreated($ticket));

        // Enviar notificación al administrador
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            $admin->notify(new TicketCreated($ticket));
        }

        return redirect()->route('ticket.index')->with('success', 'Ticket creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $user = Auth::user();

        // Verificar si el usuario es el creador del ticket, un administrador o el técnico asignado
        if ($user->id !== $ticket->user_id && !$user->is_admin && $user->id !== $ticket->technician_id) {
            // Redirigir o mostrar un mensaje de error
            return redirect()->route('ticket.index')->with('error', 'No tienes permiso para ver este ticket.');
        }

        $responses = $ticket->responses()->with('user')->get();

        return view('ticket.show', compact('ticket', 'responses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $categories = Category::pluck('name', 'id');
        $technicians = User::where('role', 'technician')->pluck('name', 'id');
        $responses = $ticket->responses()->with('user')->get();
        return view('ticket.edit', compact('ticket', 'categories', 'technicians', 'responses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
            'urgency' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx',
            'status' => 'required|string|in:Abierto,En Revisión,En Reparación,Finalizado',
            'technician_id' => 'nullable|exists:users,id',
        ]);

        $ticket->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'urgency' => $request->urgency,
            'status' => $request->status,
            'technician_id' => $request->technician_id,
        ]);

        if ($request->file('attachment')) {
            $ticket->attachment = $this->storeAttachment($request, $ticket);
            $ticket->save();
        }

        // Enviar notificación al usuario autenticado
            $user = auth()->user();
            $user->notify(new TicketCreated($ticket));

            // Enviar notificación al administrador
            $admin = User::where('role', 'admin')->first();
            if ($admin) {
                $admin->notify(new TicketCreated($ticket));
            }

                return redirect()->route('ticket.index')->with('success', 'Ticket actualizado correctamente.');
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        // Eliminar el archivo adjunto si existe
        if ($ticket->attachment) {
            Storage::disk('public')->delete($ticket->attachment);
        }

        $ticket->delete();

        return redirect()->route('ticket.index')->with('success', 'Ticket eliminado exitosamente.');
    }

    protected function storeAttachment($request, $ticket)
    {
        $ext = $request->file('attachment')->extension();
        $filename = Str::random(25) . '.' . $ext;
        $path = $request->file('attachment')->storeAs('attachments', $filename, 'public');
        return $path;
    }

    /**
     * Generate a PDF report of the tickets.
     */
    public function generatePDF()
    {
        $tickets = Ticket::all();

        $pdf = Pdf::loadView('ticket.pdf', compact('tickets'));

        return $pdf->download('reporte_tickets.pdf');
    }

    /**
     * Preview a PDF report of the tickets.
     */
    public function previewPDF()
    {
        $tickets = Ticket::all();

        $pdf = Pdf::loadView('ticket.pdf', compact('tickets'));

        return $pdf->stream('reporte_tickets.pdf');
    }
}
