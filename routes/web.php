<?php

use App\Http\Controllers\Public\LandingConroller;
use App\Http\Controllers\Public\LangController;
use Illuminate\Support\Facades\Route;

//Auth Routes
require __DIR__.'/auth.php';

//Public Routes
Route::get('/', [LandingConroller::class, 'index']);
Route::get('change', [LangController::class, 'change'])->name('changeLang');

require __DIR__.'/public/all.php';

Route::middleware(['auth','AdminUserStatus'])->group(function () {

    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::middleware(['RouteAccess'])->group(function () {

        // Tickets
        Route::group(
            [
                'prefix' => 'tickets',
            ],
            function () {
                require __DIR__.'/admin/tickets.php';
            }
        );

        // Topics
        Route::group(
            [
                'prefix' => 'topics',
            ],
            function () {
                require __DIR__.'/admin/topics.php';
            }
        );

        // Config
        Route::group(
            [
                'prefix' => 'config',
            ],
            function () {
                require __DIR__.'/admin/manage-users.php';
                require __DIR__.'/admin/manage-roles.php';
                require __DIR__.'/admin/manage-menu.php';
                require __DIR__.'/admin/site-settings.php';
            }
        );
    });

});
