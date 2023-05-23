<?php

use App\Models\Admin\Topic;
return Topic::pluck('title_unicode','id')->toArray();
