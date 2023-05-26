<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admin\Question;
use App\Models\Admin\Topic;
use App\Traits\countView;
use Illuminate\Http\Request;

class TopicListController extends Controller
{
    use countView;

    public function support($slug)
    {
        $topic = Topic::select('id','title','desc','slug')->whereSlug($slug)->whereActive(true)->firstOrFail();

        $questions = Question::where('topic_id',$topic->id)->whereActive(true)->orderBy('order')->get(['id','title','slug','topic_id']);

        return view('public.topic')->with([
            'questions' => $questions,
            'topic'     => $topic,
        ]);
    }

    public function view($slug,$slug2)
    {
        //update view count
        $this->countView($slug2);

        $question = Question::
        select(
            'topics.id as topic_id',
            'topics.title as topic_title',
            'topics.title_unicode as topic_title_unicode',
            'topics.slug as topic_slug',
            'questions.id as question_id',
            'questions.title as question_title',
            'questions.title_unicode as question_title_unicode',
            'questions.answer as answer',
            'questions.views as views',
            'questions.updated_at as updated_at',
        )
        ->join('topics','topics.id','questions.topic_id')
        ->where('topics.slug',$slug)
        ->where('questions.slug',$slug2)
        ->where('questions.active',true)
        ->firstorFail();

        return view('public.view')->with([
            'question' => $question
        ]);
    }
}
