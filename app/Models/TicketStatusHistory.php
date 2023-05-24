<?php

namespace App\Models;

use App\Models\Admin\Ticket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatusHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'details',
        'updated_at'
    ];

    public function Ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
