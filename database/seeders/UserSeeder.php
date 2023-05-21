<?php

namespace Database\Seeders;

use App\Models\Admin\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::truncate();

        $data = [
            [
                'id'         => Str::uuid(36),
                'name'       => 'Admin',
                'username'   => 'admin',
                'email'      => 'admin@admin.com',
                'mobile'     => '1234567890',
                'role_id'    => '0',
                'password'   => Hash::make('123456'),
                'active'     => true,
                'created_at' => now()
            ]
        ];

        User::insert($data);
    }
}
