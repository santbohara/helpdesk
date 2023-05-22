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
                'active' => true,
            ],
            [
                'title' => 'On Hold',
                'active' => true,
            ],
            [
                'title' => 'Closed',
                'active' => true,
            ],
            [
                'title' => 'Rejected',
                'active' => true,
            ]
        ];

        TicketStatus::insert($data);
    }
}
