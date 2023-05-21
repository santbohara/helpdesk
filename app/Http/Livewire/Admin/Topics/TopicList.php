<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Models\Admin\Topic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class TopicList extends Component
{
    use WithFileUploads;

    public $search = "",
    $title, $title_unicode,
    $desc, $desc_unicode,
    $icon,
    $slug,
    $active = [],
    $filepath = "";

    public function render()
    {
        $topics = Topic::search('title',$this->search)->withCount('Questions')->orderBy('order')->paginate('10');

        return view('livewire.admin.topics.topic-list',[
            'topics' => $topics
        ]);
    }

    protected $rules = [
        'title'         => 'required|min:2',
        'title_unicode' => 'required',
        'desc'          => 'required|min:10|max:100',
        'desc_unicode'  => 'required',
        'icon'          => 'required|image|max:500|mimes:jpg,jpeg,png',
        'slug'          => 'required|unique:topics',
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

            // Upload file
            $icon_path = $this->icon->store('icons', 'public');

            // File path
            $this->filepath = Storage::url($icon_path);

            Topic::create([
                'title'         => $this->title,
                'title_unicode' => $this->title_unicode,
                'desc'          => $this->desc,
                'desc_unicode'  => $this->desc_unicode,
                'icon'          => $icon_path,
                'slug'          => $this->slug,
                'active'        => $this->active ? true : false,
                'created_by'    => auth()->user()->name,
            ]);

            session()->flash('success','Data saved successfully!');

        } catch (\Exception $ex) {
            session()->flash('fail','Something goes wrong!! '.$ex->getMessage());
        }

        return redirect()->route('topic.list');
    }

    public function updateTaskOrder($items)
    {
        foreach($items as $item){
            Topic::whereId($item['value'])->update(['order' => $item['order']]);
        }

        Alert::toast('Data saved successfully!','success');
    }
}
