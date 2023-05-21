<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuGroup extends Model
{
    use HasFactory, HasUuids;

    public function Menus()
    {
        return $this->hasMany(Menu::class,'menu_groups_id')->whereActive(true);
    }
}
