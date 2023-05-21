<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'menu_groups_id',
        'menu_title',
        'route_prefix',
        'icon',
        'order',
        'active',
    ];

    public function MenuGroup()
    {
        return $this->belongsTo(MenuGroup::class,'menu_groups_id');
    }
}
