<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TicketStatus;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'attachment',
        'user_id',
        'status',
        'urgency',
        'category_id', // Agrega el campo category_id aquí
        'technician_id',
    ];
    protected $casts = [
        'status' => TicketStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
