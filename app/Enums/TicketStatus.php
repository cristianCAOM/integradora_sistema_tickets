<?php

Namespace App\Enums;

enum TicketStatus: string
{
    case OPEN = 'Abierto';
    case RESOLVED = 'Resuelto';
    case REJECTED = 'Rechazado';
}
