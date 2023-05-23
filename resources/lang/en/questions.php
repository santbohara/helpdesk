<?php

use App\Models\Admin\Question;
return Question::pluck('title','id')->toArray();
