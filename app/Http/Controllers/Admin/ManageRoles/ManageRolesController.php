<?php

namespace App\Http\Controllers\Admin\ManageRoles;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class ManageRolesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:approve',    ['only' => []]);
        $this->middleware('permission:edit',    ['only' => ['permissionDetails']]);
        $this->middleware('permission:list',    ['only' => ['index']]);
        $this->middleware('permission:delete',  ['only' => []]);
        $this->middleware('permission:create',    ['only' => []]);
    }

    public function index()
    {
        $roles       = Role::get();
        $permissions = Permission::get();

        return view('admin.manage-roles.index')->with([
            'roles'       => $roles,
            'permissions' => $permissions
        ]);
    }

    public function permissionDetails(Request $request)
    {
        $role = Role::findOrFail($request->id);
        $permissions = Permission::get();

        if($role == 'Admin'){
            return back()->withFail('Permission denied!');
        }

        return response()->json([
            'view' => view('admin.manage-roles.edit-permission')->with([
                'role'          => $role,
                'permissions'   => $permissions
            ])->render()
       ]);
    }

    public function editPermission(Request $request)
    {
        $request->validate([
            'role_name'    => 'required',
            'role_id'    => 'required',
            'permission' => 'required',
        ]);

        $role = Role::findOrFail($request->role_id);
        $role->name = $request->role_name;
        $role->save();

        $role->syncPermissions($request->permission);

        return back()->withSuccess('Permission updated successfully.');
    }
}
