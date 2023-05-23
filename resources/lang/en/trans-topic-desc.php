<?php

//Topic Translation
use App\Models\Admin\Topic;
return Topic::pluck('desc','id')->toArray();
