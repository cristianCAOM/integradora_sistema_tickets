<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function dashboard()
    {
        // Lógica para el dashboard del técnico
        return view('technician.dashboard');
    }

    public function tickets()
    {
        // Lógica para ver los tickets del técnico
        return view('technician.tickets');
    }
}
