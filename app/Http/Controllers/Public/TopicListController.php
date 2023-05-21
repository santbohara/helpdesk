<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admin\Question;
use App\Models\Admin\Topic;
use Illuminate\Http\Request;

class TopicListController extends Controller
{
    public function support($slug)
    {
        $topic = Topic::select('id','title','desc','slug')->whereSlug($slug)->whereActive(true)->first();

        $questions = Question::where('topic_id',$topic->id)->whereActive(true)->orderBy('order')->get(['title','slug','topic_id']);

        return view('public.topic')->with([
            'questions' => $questions,
            'topic'     => $topic,
        ]);
    }

    public function view($slug)
    {
        $question = Question::with('Topic')->whereSlug($slug)->whereActive(true)->orderBy('order')->first();

        return view('public.view')->with([
            'question' => $question
        ]);
    }
}
