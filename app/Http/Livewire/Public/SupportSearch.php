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
        $this->data = Question::with('Topic')
            ->where('title', 'like', '%' . $this->term . '%')
            ->orWhere('title_unicode', 'like', '%' . $this->term . '%')
            ->get();
    }
}
