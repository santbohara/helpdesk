<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Models\Admin\Question;
use App\Models\Admin\Topic;
use Illuminate\Support\Str;
use Livewire\Component;

class AddQuestion extends Component
{
    public
    $topic,
    $title, $title_unicode,
    $slug,
    $dispatch,
    $ckEditor,
    $answer,
    $active = [];

    public function render()
    {
        $topics = Topic::whereActive(true)->orderBy('title')->get();

        return view('livewire.admin.topics.add-question',[
            'topics' => $topics
        ]);
    }

    protected $rules = [
        'topic'         => 'required',
        'title'         => 'required|min:2',
        'title_unicode' => 'required',
        'slug'          => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        $this->slug = Str::slug($this->title);
    }

    public function add()
    {
        $this->validate();

        try {

            Question::create([
                'topic_id'      => $this->topic,
                'title'         => $this->title,
                'title_unicode' => $this->title_unicode,
                'slug'          => $this->slug,
                'answer'        => $this->answer,
                'active'        => $this->active ? true : false,
                'created_by'    => auth()->user()->name,
            ]);

            session()->flash('success','Question added successfully!');

        } catch (\Exception $ex) {
            session()->flash('fail','Something goes wrong!! '.$ex->getMessage());
        }
    }
}
