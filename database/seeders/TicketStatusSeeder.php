<?php

namespace Database\Seeders;

use App\Models\Admin\TicketStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Pending',
                'badge_class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                'active' => true,
            ],
            [
                'title' => 'On Hold',
                'badge_class' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-300',
                'active' => true,
            ],
            [
                'title' => 'Closed',
                'badge_class' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
                'active' => true,
            ],
            [
                'title' => 'Rejected',
                'badge_class' => 'bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-300',
                'active' => true,
            ]
        ];

        TicketStatus::insert($data);
    }
}
