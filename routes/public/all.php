<?php

use App\Http\Controllers\Public\RaiseTicketController;
use App\Http\Controllers\Public\TopicListController;

Route::get('support/{slug}',[TopicListController::class,'support'])->name('support.topic');

Route::get('support/{slug}/{slug2}',[TopicListController::class,'view'])->name('support.view');

Route::get('raise/ticekt',[RaiseTicketController::class,'index'])->name('raise.ticket');
