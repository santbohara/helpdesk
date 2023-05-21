<?php

use App\Http\Livewire\Admin\ManageUser\Index;
use App\Http\Livewire\Admin\ManageUser\EditUser;

//Only for create Permission
Route::group(['middleware' => 'permission:edit'], function () {
    //
});

//Only for edit Permission
Route::group(['middleware' => 'permission:edit'], function () {

    Route::get('manage-users/edit-user/{id}', EditUser::class)->name('edit.user');
});

//Only for list permission
Route::group(['middleware' => 'permission:list'], function () {

    Route::get('manage-users', Index::class);
});

//Only for delete permission
Route::group(['middleware' => 'permission:list'], function () {
    //
});
