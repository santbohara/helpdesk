<?php

namespace Database\Seeders;

use App\Models\MenuGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuGroup::truncate();

        $data = [
            [
                'id' => Str::uuid(),
                'title' => 'Tickets',
                'order' => 1,
                'active' => true,
                'created_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Topics',
                'order' => 2,
                'active' => true,
                'created_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Config',
                'order' => 3,
                'active' => true,
                'created_at' => now()
            ],
        ];

        MenuGroup::insert($data);
    }
}
