<?php

use App\Models\Admin\Question;
return Question::pluck('title_unicode','id')->toArray();
