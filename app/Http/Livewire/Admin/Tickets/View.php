<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Admin\Ticket;
use App\Models\Admin\TicketStatus;
use App\Models\TicketStatusHistory;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class View extends Component
{
    use LivewireAlert;

    public $ticket, $statusId, $replyContent;

    public function mount($id)
    {
        $this->ticket = Ticket::findOrFail($id);
        $this->statusId = $this->ticket->status;
    }

    public function render()
    {
        return view('livewire.admin.tickets.view',[
            'ticket'   => $this->ticket,
            'statuses' => TicketStatus::get(),
            'statusHistory' => TicketStatusHistory::whereTicketId($this->ticket->id)->orderBy('created_at','DESC')->get(),
        ]);
    }

    public function updateStatus()
    {
        $data = Ticket::findOrFail($this->ticket->id);

        //Only update if status is not same as existing
        if($this->statusId != $data->status){

            $data->status = $this->statusId;

            //Keep the seperate record of the change
            $statusTitle = TicketStatus::whereId($data->status)->value('title');
            TicketStatusHistory::create([
                'ticket_id' => $data->id,
                'details' => "Status changed to : ".$statusTitle." by ".\Auth::user()->username,
            ]);

            //Update Status
            $data->save();

            $this->alert('success', 'Status changed!');
        }
    }

    public function sendReply()
    {
        dd($this->replyContent);
    }
}
