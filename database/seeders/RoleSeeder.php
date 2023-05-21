<?php

namespace Database\Seeders;

use App\Models\Admin\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(
            [
                'id'         => Str::uuid(36),
<<<<<<< HEAD
                'name'       => 'Admin',
=======
                'name'       => 'SuperAdmin',
>>>>>>> 6a01074 (Add existing project files to Git)
                'guard_name' => 'web',
                'created_at' => now()
            ]
        );

        $role->syncPermissions(['list','create','edit','delete','approve']);
    }
}
