<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'active',
        'updated_at',
    ];
}
