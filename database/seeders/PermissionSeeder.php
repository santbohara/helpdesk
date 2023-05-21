<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => Str::uuid(36),
                'name' => 'list',
                'guard_name' => 'web',
                'created_at' => now()
            ],
            [
                'id' => Str::uuid(36),
                'name' => 'create',
                'guard_name' => 'web',
                'created_at' => now()
            ],
            [
                'id' => Str::uuid(36),
                'name' => 'edit',
                'guard_name' => 'web',
                'created_at' => now()
            ],
            [
                'id' => Str::uuid(36),
                'name' => 'delete',
                'guard_name' => 'web',
                'created_at' => now()
            ],
            [
                'id' => Str::uuid(36),
                'name' => 'approve',
                'guard_name' => 'web',
                'created_at' => now()
            ]
        ];

        Permission::insert($data);
    }
}
