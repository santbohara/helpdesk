<?php

namespace Database\Seeders;

use App\Models\Admin\Menu;
use App\Models\Admin\MenuGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id'             => Str::uuid(36),
                'menu_groups_id' => MenuGroup::whereTitle('Tickets')->value('id'),
                'menu_title'     => 'Pending',
                'route_prefix'   => 'tickets/pending',
                'icon'           => 'bi bi-inbox',
                'order'          => '1',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'id'             => Str::uuid(36),
                'menu_groups_id' => MenuGroup::whereTitle('Tickets')->value('id'),
                'menu_title'     => 'All Tickets',
                'route_prefix'   => 'tickets/all-tickets',
                'icon'           => 'bi bi-list-task',
                'order'          => '3',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'id'             => Str::uuid(36),
                'menu_groups_id' => MenuGroup::whereTitle('Topics')->value('id'),
                'menu_title'     => 'Topics List',
                'route_prefix'   => 'topics/topics-list',
                'icon'           => 'bi bi-view-list',
                'order'          => '3',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'id'             => Str::uuid(36),
                'menu_groups_id' => MenuGroup::whereTitle('Topics')->value('id'),
                'menu_title'     => 'Questions',
                'route_prefix'   => 'topics/questions',
                'icon'           => 'bi bi-question-circle',
                'order'          => '3',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'id'             => Str::uuid(36),
                'menu_groups_id' => MenuGroup::whereTitle('Config')->value('id'),
                'menu_title'     => 'Manage Users',
                'route_prefix'   => 'config/manage-users',
                'icon'           => 'bi bi-people',
                'order'          => '3',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'id'             => Str::uuid(36),
                'menu_groups_id' => MenuGroup::whereTitle('Config')->value('id'),
                'menu_title'     => 'Manage Roles',
                'route_prefix'   => 'config/manage-roles',
                'icon'           => 'bi bi-person-check',
                'order'          => '3',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'id'             => Str::uuid(36),
                'menu_groups_id' => MenuGroup::whereTitle('Config')->value('id'),
                'menu_title'     => 'Site Settings',
                'route_prefix'   => 'config/site-settings',
                'icon'           => 'bi bi-gear',
                'order'          => '3',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'id'             => Str::uuid(36),
                'menu_groups_id' => MenuGroup::whereTitle('Config')->value('id'),
                'menu_title'     => 'Manage Menu',
                'route_prefix'   => 'config/manage-menu',
                'icon'           => 'bi bi-menu-up',
                'order'          => '3',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now()
            ],
        ];

        Menu::insert($data);
    }
}
