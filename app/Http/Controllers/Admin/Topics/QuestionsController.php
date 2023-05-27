<?php

namespace App\Http\Controllers\Admin\Topics;

use App\Http\Controllers\Controller;
use App\Models\Admin\Question;
use App\Models\Admin\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $topics = Topic::whereActive(true)->orderBy('title')->get();
        return view('admin.topics.add-question',[
            'topics' => $topics
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'topic'         => 'required',
            'title'         => 'required|min:2',
            'title_unicode' => 'required',
        ]);

        $slug = Str::slug($request->title);

        // Slug should be qnique
        $check_slug = Question::whereSlug($slug)->value('slug');

        if($check_slug){
            return back()->with('fail','Erro! Title already used. Please use different one.')->withInput($request->input());
        }

        try {

            Question::create([
                'topic_id'      => $request->topic,
                'title'         => $request->title,
                'title_unicode' => $request->title_unicode,
                'slug'          => $slug,
                'answer'        => $request->content,
                'active'        => $request->active ? true : false,
                'created_by'    => auth()->user()->name,
            ]);

            session()->flash('success','Question added successfully!');

        } catch (\Exception $ex) {
            session()->flash('fail','Something goes wrong!! '.$ex->getMessage());
        }

        return back();
    }

    public function view($id)
    {
        $question = Question::with('Feedback')->findOrFail($id);

        return view('admin.topics.view-question',[
            'question' => $question
        ]);
    }

    public function edit($id)
    {
        $topics = Topic::whereActive(true)->orderBy('title')->get();
        $question = Question::findOrFail($id);

        return view('admin.topics.edit-question',[
            'question' => $question,
            'topics'   => $topics
        ]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'topic'         => 'required',
            'title'         => 'required|min:2',
            'title_unicode' => 'required',
        ]);

        $question = Question::findOrFail($id);

        $slug = Str::slug($request->title);

        // Title & Slug should be qnique
        if($question->title != $request->title){

            $check_slug = Question::whereSlug($slug)->value('slug');

            if($check_slug){
                return back()->with('fail','Erro! Title already used. Please use different one.')->withInput($request->input());
            }
        }

        $question->topic_id      = $request->topic;
        $question->title         = $request->title;
        $question->title_unicode = $request->title_unicode;
        $question->slug          = $slug;
        $question->answer        = $request->content;
        $question->active        = $request->active ? true : false;
        $question->updated_at    = now();

        try {

            $question->save();

            session()->flash('success','Question updated successfully!');

        } catch (\Exception $ex) {
            session()->flash('fail','Something goes wrong!! '.$ex->getMessage());
        }

        return redirect()->route('questions.edit',$id);
    }

    public function delete($id)
    {
        $question = Question::findOrFail($id);

        try {

            $question->delete();

            session()->flash('success','Question updated successfully!');

        } catch (\Exception $ex) {
            session()->flash('fail','Something goes wrong!! '.$ex->getMessage());
        }

        return redirect()->route('topic.questions');

    }

    public function reorder()
    {
        $topics = Topic::whereActive(true)->orderBy('title')->get();

        return view('admin.topics.reorder-question',[
            'topics'   => $topics
        ]);
    }
}
