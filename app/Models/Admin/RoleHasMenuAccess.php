<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasMenuAccess extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'role_has_menu_access';

    public function SubMenu(){
        return $this->belongsTo(MenuGroup::class, "group_id");
    }

    public function Menu(){
        return $this->belongsTo(Menu::class, "menu_id");
    }
}
