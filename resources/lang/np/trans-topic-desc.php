<?php

use App\Models\Admin\Topic;
return Topic::pluck('desc_unicode','id')->toArray();
