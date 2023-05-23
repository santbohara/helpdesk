<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Admin\Ticket;
use App\Models\Admin\TicketStatus;
use Livewire\Component;

class View extends Component
{
    public $ticket;

    public function mount($id)
    {
        $this->ticket = Ticket::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.tickets.view',[
            'ticket'   => $this->ticket,
            'statuses' => TicketStatus::get()
        ]);
    }
}
