<?php

use App\Http\Livewire\Admin\SiteSettings\SiteSettings;

//Only for create Permission
Route::group(['middleware' => 'permission:edit'], function () {
});

//Only for edit Permission
Route::group(['middleware' => 'permission:edit'], function () {
});

//Only for list permission
Route::group(['middleware' => 'permission:list'], function () {

    Route::get('site-settings', SiteSettings::class)->name('siteSettings.index');
});

//Only for delete permission
Route::group(['middleware' => 'permission:list'], function () {
});
