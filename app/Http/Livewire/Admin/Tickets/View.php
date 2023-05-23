<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Admin\Ticket;
use App\Models\Admin\TicketStatus;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class View extends Component
{
    use LivewireAlert;

    public $ticket, $statusId;

    public function mount($id)
    {
        $this->ticket = Ticket::findOrFail($id);
        $this->statusId = $this->ticket->status;
    }

    public function render()
    {
        return view('livewire.admin.tickets.view',[
            'ticket'   => $this->ticket,
            'statuses' => TicketStatus::get()
        ]);
    }

    public function updateStatus()
    {
        $data = Ticket::findOrFail($this->ticket->id);

        //Only update if status is not same as existing
        if($this->statusId != $data->status){
            
            $data->status = $this->statusId;

            $data->save();

            $this->alert('success', 'Status changed!');
        }
    }
}
