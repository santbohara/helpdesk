<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group_id = MenuGroup::whereTitle('Config')->value('id');
        $data = [
            [
                'id'             => Str::uuid(36),
                'menu_groups_id' => $group_id,
                'menu_title'     => 'Manage Menu',
                'route_prefix'   => 'config/manage-menu',
                'icon'           => 'bi bi-gear',
                'order'          => '3',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now()
            ]
        ];

        Menu::insert($data);
    }
}
