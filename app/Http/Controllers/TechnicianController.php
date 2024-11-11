<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicianController extends Controller
{
    public function dashboard()
    {
        // Asegúrate de asignar tickets a la variable
        $tickets = Ticket::where('technician_id', auth()->id())->get(); // Ajusta la consulta según tu estructura de datos

        // Verifica que estás retornando la vista y pasando los datos
        return view('technician.dashboard', compact('tickets'));
    }

    public function tickets()
    {
        $technicianId = Auth::id();
        $tickets = Ticket::where('technician_id', $technicianId)->get();

        return view('technician.tickets', compact('tickets'));
    }
}
