<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admin\Question;
use App\Models\Admin\Topic;
use Illuminate\Http\Request;

class LandingConroller extends Controller
{
    public function index()
    {
        $topics            = Topic::whereActive(true)->orderBy('order')->get();
        $frequentQuestions = Question::with('Topic')->latest()->take(5)->get();;

        return view('public.landing')->with([
            'topics'            => $topics,
            'frequentQuestions' => $frequentQuestions,
        ]);
    }
}
