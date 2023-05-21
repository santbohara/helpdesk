<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admin\Topic;
use Illuminate\Http\Request;

class LandingConroller extends Controller
{
    public function index()
    {
        $topics = Topic::whereActive(true)->orderBy('order')->get();

        return view('public.landing')->with([
            'topics' => $topics
        ]);
    }
}
