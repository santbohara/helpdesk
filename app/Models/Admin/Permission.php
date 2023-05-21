<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Models\Permission as SpatieRoles;

class Permission extends SpatieRoles
{
    use HasUuids;

    protected $keyType = 'string';
    protected $primaryKey = 'id';
}
