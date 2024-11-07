<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Store a newly created response in storage.
     */
    public function store(Request $request, $ticketId)
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        Response::create([
            'response' => $request->response,
            'user_id' => auth()->id(),
            'ticket_id' => $ticketId,
        ]);

        return redirect()->route('ticket.show', $ticketId)->with('success', 'Respuesta agregada exitosamente.');
    }

    /**
     * Remove the specified response from storage.
     */
    public function destroy(Response $response)
    {
        $response->delete();
        return redirect()->back()->with('success', 'Respuesta eliminada exitosamente.');
    }
}
