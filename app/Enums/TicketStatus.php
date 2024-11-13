<?php

Namespace App\Enums;

enum TicketStatus: string
{
    case OPEN = 'Abierto';
    case UNDER_REVIEW = 'En Revisión';
    case UNDER_REPAIR = 'En Reparación';
    case COMPLETED = 'Finalizado';
}
