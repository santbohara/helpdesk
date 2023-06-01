<?php

namespace App\Http\Livewire\Public;

use App\Models\Admin\Question;
use Livewire\Component;

class SupportSearch extends Component
{
    public $term;
    public $data;

    public function render()
    {
        return view('livewire.public.support-search');
    }

    public function updatedTerm()
    {
        $this->data = Question::select('questions.*','topics.slug as t_slug','topics.active')
        ->join('topics','topics.id','questions.topic_id')
        ->where('questions.active',true)
        ->where('topics.active',true)
        ->where(function($query) {
            $query
            ->where('questions.title', 'like', '%' . $this->term . '%')
            ->orWhere('questions.title_unicode', 'like', '%' . $this->term . '%')
            ->orWhere('topics.title', 'like', '%' . $this->term . '%')
            ->orWhere('topics.title_unicode', 'like', '%' . $this->term . '%');
        })
        ->get();
    }
}
