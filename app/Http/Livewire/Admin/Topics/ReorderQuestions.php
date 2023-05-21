<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Models\Admin\Question;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class ReorderQuestions extends Component
{
    public $qId;

    public function mount($id)
    {
        $this->qId = $id;
    }

    public function render()
    {
        return view('livewire.admin.topics.reorder-questions',[
            'questions' => Question::where('topic_id',$this->qId)->orderBy('order')->get()
        ]);
    }

    public function updateOrder($items)
    {
        foreach($items as $item){
            Question::whereId($item['value'])->update(['order' => $item['order']]);
        }
    }
}
