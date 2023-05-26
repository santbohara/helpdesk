<?php

namespace App\Traits;

use App\Models\Admin\Question;
use Illuminate\Support\Facades\Session;

trait countView
{
    // Increase view count by 1 for each session
    // taking session as count to avoid multiple refresh by same user.
    public function countView($slug)
    {
        $Key = 'key_' . $slug;
        
        if (!Session::has($Key)) {
            
            //increment view count by one
            Question::whereSlug($slug)->increment('views',1);

            Session::put($Key, 1);
        }
    }
}
