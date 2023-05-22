<?php

use App\Http\Livewire\Admin\Tickets\AllTickets;
use App\Http\Livewire\Admin\Tickets\FollowUp;
use App\Http\Livewire\Admin\Tickets\Pending;
use App\Http\Livewire\Admin\Tickets\View;

//Only for create Permission
Route::group(['middleware' => 'permission:edit'], function () {
});

//Only for edit Permission
Route::group(['middleware' => 'permission:edit'], function () {
});

//Only for list permission
Route::group(['middleware' => 'permission:list'], function () {

    Route::get('pending', Pending::class)->name('ticket.pending.index');
    Route::get('all-tickets', AllTickets::class)->name('ticket.all');
    Route::get('all-tickets/{id}', View::class)->name('ticket.view');
});

//Only for delete permission
Route::group(['middleware' => 'permission:delete'], function () {
});
