<?php

use App\Http\Controllers\Admin\ManageRoles\ManageRolesController;
use App\Http\Controllers\Admin\ManageRoles\MenuAccessController;

Route::group(
    [
        'namespace' => 'ManageRoles',
    ],
    function () {

        Route::get('manage-roles', [ManageRolesController::class, 'index'])->name('ManageRolesController@index');
        Route::post('manage-roles/permission-details', [ManageRolesController::class, 'permissionDetails'])->name('ManageRolesController@permissionDetails');
        Route::post('manage-roles/edit-permission', [ManageRolesController::class, 'editPermission'])->name('ManageRolesController@editPermission');

        Route::get('manage-roles/menu-access/{id}', [MenuAccessController::class, 'index'])->name('MenuAccessController@index');
        Route::post('manage-roles/menu-access/{id}', [MenuAccessController::class, 'menuAccessUpdate'])->name('MenuAccessController@menuAccessUpdate');
    }
);
