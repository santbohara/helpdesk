<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Exports\Admin\QuestionsExport;
use App\Models\Admin\Question;
use App\Models\Admin\Topic;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Questions extends Component
{
    use WithPagination;

    public $search = "";
    public $topic  = [];
    public $active = [];

    public function render()
    {
        $questions = Question::search('title',$this->search)
            ->when(count(array_filter($this->topic)), function ($query) {
                return $query->whereIn('topic_id', $this->topic);
            })
            ->when(count(array_filter($this->active)), function ($query) {
                return $query->whereIn('active', $this->active);
            })
        ->with('Topic')
        ->orderBy('order')
        ->paginate('8');

        $topics = Topic::whereActive(true)->orderBy('order')->get();

        return view('livewire.admin.topics.questions',[
            'questions' => $questions,
            'topics'    => $topics
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
