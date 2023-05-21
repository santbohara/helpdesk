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

<<<<<<< HEAD
        $user = User::create(
=======
        $data = [
>>>>>>> 6a01074 (Add existing project files to Git)
            [
                'id'         => Str::uuid(36),
                'name'       => 'Admin',
                'username'   => 'admin',
                'email'      => 'admin@admin.com',
<<<<<<< HEAD
                'mobile'     => '9841000000',
=======
                'mobile'     => '1234567890',
>>>>>>> 6a01074 (Add existing project files to Git)
                'role_id'    => '0',
                'password'   => Hash::make('123456'),
                'active'     => true,
                'created_at' => now()
            ]
<<<<<<< HEAD
        );

        $user->assignRole('Admin');
=======
        ];

        User::insert($data);
>>>>>>> 6a01074 (Add existing project files to Git)
    }
}
