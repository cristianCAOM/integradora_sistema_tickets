<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function store(Request $request, Ticket $ticket)
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        Response::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'response' => $request->response,
        ]);

        return redirect()->route('ticket.show', $ticket)->with('success', 'Response added successfully.');
    }
}
