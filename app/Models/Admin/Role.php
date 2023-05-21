<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Models\Role as SpatieRoles;

class Role extends SpatieRoles
{
    use HasUuids;

    protected $keyType = 'string';
    protected $primaryKey = 'id';
}
