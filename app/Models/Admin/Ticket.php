<?php

namespace App\Models\Admin;

use App\Models\TicketResponse;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'ticket_id',
        'name',
        'account_number',
        'mobile',
        'email',
        'topic_id',
        'subject',
        'description',
        'status',
        'ip',
        'user_agent',
        'updated_at',
    ];

    public function Topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function Status()
    {
        return $this->belongsTo(TicketStatus::class,'status');
    }

    public function Reply()
    {
        return $this->hasMany(TicketResponse::class,'ticket_id');
    }
}
