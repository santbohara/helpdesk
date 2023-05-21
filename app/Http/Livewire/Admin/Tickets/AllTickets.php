<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Exports\Admin\QuestionsExport;
use App\Models\Admin\Ticket;
use App\Models\Admin\Topic;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class AllTickets extends Component
{
    use WithPagination;

    public $topic = [];
    public $active = [];
    public $search = '';
    public $sortBy = 'created_at';
    public $sortOrder = 'desc';

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
        return view('livewire.admin.tickets.all-tickets', [

            'tickets' => Ticket::search('ticket_id', $this->search)
            ->when(count(array_filter($this->topic)), function ($query) {
                return $query->whereIn('topic_id', $this->topic);
            })
            ->when(count(array_filter($this->active)), function ($query) {
                return $query->whereIn('status', $this->active);
            })
            ->with('Topic')
            ->orderBy($this->sortBy, $this->sortOrder)
            ->paginate('8'),

            'topics' => Topic::whereActive(true)
                ->orderBy('order')
                ->get(),
        ]);
    }

    public function refresh() {
        $this->topic = [];
        $this->active = [];
    }

    public function export($type)
    {
        abort_if(!in_array($type,['xlsx']), Response::HTTP_FORBIDDEN);

        return Excel::download(new QuestionsExport, 'Export.'.$type);
    }
}
