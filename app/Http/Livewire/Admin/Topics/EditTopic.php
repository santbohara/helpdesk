<?php

namespace App\Http\Livewire\Admin\Topics;

use App\Models\Admin\Topic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class EditTopic extends Component
{
    use WithFileUploads;

    public
    $topic_id,
    $topic,
    $title, $title_unicode,
    $desc, $desc_unicode,
    $icon,
    $slug,
    $active = [],
    $created_by,
    $filepath = "";

    public function mount($id)
    {
        $this->topic = Topic::findOrFail($id);

        $this->topic_id      = $this->topic->id;
        $this->title         = $this->topic->title;
        $this->title_unicode = $this->topic->title_unicode;
        $this->desc          = $this->topic->desc;
        $this->desc_unicode  = $this->topic->desc_unicode;
        $this->active        = $this->topic->active;
        $this->slug          = $this->topic->slug;

    }

    public function render()
    {
        return view('livewire.admin.topics.edit-topic');
    }

    protected $rules = [
        'title'         => 'required|min:2',
        'title_unicode' => 'required',
        'desc'          => 'required|min:10|max:100',
        'desc_unicode'  => 'required',
        'slug'          => 'required',
        'active'        => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        $this->slug = Str::slug($this->title);
    }

    public function update()
    {
        $this->validate();

        if($this->title != $this->topic->title){

            $this->validate([
                'slug' => 'unique:topics',
            ]);

        }

        $topic = Topic::findOrFail($this->topic_id);

        if(!empty($this->icon)){

            $this->validate([
                'icon' => 'required|image|max:500|mimes:jpg,jpeg,png',
            ]);

            try{

                // Upload file
                $icon_path = $this->icon->store('icons', 'public');

                // File path
                $this->filepath = Storage::url($icon_path);

                //Store in DB as well
                $topic->icon          = $icon_path;

            }catch (\Exception $ex) {
                session()->flash('fail','Icon upload error! '.$ex->getMessage());
            }
        }

        $topic->title         = $this->title;
        $topic->title_unicode = $this->title_unicode;
        $topic->desc          = $this->desc;
        $topic->desc_unicode  = $this->desc_unicode;
        $topic->slug          = $this->slug;
        $topic->active        = $this->active ? true : false;

        try {

            $topic->save();

            session()->flash('success','Data saved successfully!');
            Alert::toast('Data saved successfully!','success');

        } catch (\Exception $ex) {
            session()->flash('fail','Something goes wrong!! '.$ex->getMessage());
        }

        return redirect()->route('topic.list');
    }

    public function delete()
    {
        $data = Topic::select('id')->withCount('Questions')->where('id',$this->topic_id)->first();

        //Delete not allowed if there is associated questions.
        if($data->questions_count === 0){

            try {

                $data->delete();

                session()->flash('success','Topic delete sucessfully');

                return redirect()->route('topic.list');

            } catch (\Exception $ex) {
                session()->flash('fail','Something goes wrong!! '.$ex->getMessage());
            }

        }

        session()->flash('fail','You can not delete this topic! It has questions!', 'error');
    }
}
