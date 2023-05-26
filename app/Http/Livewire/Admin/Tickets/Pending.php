<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Exports\Admin\QuestionsExport;
use App\Exports\Admin\TicketsExport;
use App\Models\Admin\Ticket;
use App\Models\Admin\TicketStatus;
use App\Models\Admin\Topic;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Pending extends Component
{
    use WithPagination;

    public $topic = [];
    public $active = [];
    public $search = '';
    public $sortBy = 'created_at';
    public $sortOrder = 'desc';

    public $filter = false;
    public $topic_id, $ticket_id, $account_number, $mobile, $created_at, $created_date_from, $created_date_to;

    protected $listeners = ['filter'];

    public function sortBy($fields)
    {
        if ($this->sortBy === $fields) {
            $this->sortOrder = $this->sortOrder === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortOrder = 'asc';
        }
        $this->sortBy = $fields;
    }

    public function render()
    {
        $query = Ticket::query();

        $query->when($this->topic_id, function ($query) {
            $query = $query->where('topic_id',$this->topic_id);
        });

        $query->when($this->ticket_id, function ($query) {
            $query = $query->where('ticket_id','like','%'.$this->ticket_id.'%');
        });

        $query->when($this->account_number, function ($query) {
            $query = $query->where('account_number','like','%'.$this->account_number.'%');
        });

        $query->when($this->mobile, function ($query) {
            $query = $query->where('mobile','like','%'.$this->mobile.'%');
        });

        $query->when($this->created_date_from, function ($query) {
            $query = $query->where('created_at','>=',$this->created_date_from .' 00:00:00');
        });

        $query->when($this->created_date_to, function ($query) {
            $query = $query->where('created_at','<=',$this->created_date_to.' 23:59:59');
        });

        $query = $query->search('ticket_id',$this->search)
        ->whereStatus('1')
        ->with('Topic')
        ->with('Status')
        ->withCount('Reply')
        ->orderBy($this->sortBy, $this->sortOrder)
        ->paginate(15);

        return view('livewire.admin.tickets.tickets-pending', [

            'tickets' => $query,

            'topics' => Topic::whereActive(true)
                ->orderBy('order')
                ->get(),
        ]);
    }

    public function refresh() {

        $this->filter = false;
        $this->topic_id = "";
        $this->ticket_id = "";
        $this->account_number = "";
        $this->mobile = "";
        $this->created_at = "";
        $this->created_date_from = "";
        $this->created_date_to = "";

        return $this->render();
    }

    public function export($type)
    {
        abort_if(!in_array($type,['xlsx']), Response::HTTP_FORBIDDEN);

        return Excel::download(new TicketsExport(1), 'Export.'.$type);
    }

    public function filter()
    {
        $this->filter = true;

        return $this->render();
    }
}
