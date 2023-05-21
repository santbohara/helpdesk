<?php

use App\Http\Livewire\Admin\ManageMenu\ManageMenu;

//Only for create Permission
Route::group(['middleware' => 'permission:edit'], function () {
});

//Only for edit Permission
Route::group(['middleware' => 'permission:edit'], function () {
});

//Only for list permission
Route::group(['middleware' => 'permission:list'], function () {

    Route::get('manage-menu', ManageMenu::class)->name('ManageMenu.index');
});

//Only for delete permission
Route::group(['middleware' => 'permission:list'], function () {
});
