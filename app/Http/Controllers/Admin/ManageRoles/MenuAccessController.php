<?php

namespace App\Http\Controllers\Admin\ManageRoles;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\MenuGroup;
use App\Models\Admin\Role;
use App\Models\Admin\RoleHasMenuAccess;
use Illuminate\Http\Request;

class MenuAccessController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:approve',    ['only' => []]);
        $this->middleware('permission:edit',    ['only' => ['menuAccessUpdate', 'RoleMenuAccess']]);
        $this->middleware('permission:list',    ['only' => ['index']]);
        $this->middleware('permission:delete',  ['only' => []]);
        $this->middleware('permission:create',    ['only' => []]);
    }

    public function index($id)
    {
        $role = Role::findOrFail($id);

        if($role->name == 'Admin'){
            abort(403);
        }

        $menuGroup = MenuGroup::with('Menus')->get();

        global $rid; $rid = $id;

        return view('admin.manage-roles.menu-access')->with([
            'role'      => $role,
            'menuGroup' => $menuGroup
        ]);
    }

    public function menuAccessUpdate(Request $Request,$role)
    {
        $menu_id = $Request->input('menu_id');

        if(empty($menu_id) || empty($role)){
            return back()->withFail('Please select at-leat one Menu');
        }

        //delete old access before adding new
        RoleHasMenuAccess::where('role_id',$role)->delete();

        foreach ($menu_id as $menu) {

            $group_id    = Menu::where('id',$menu)->value('menu_groups_id');

            $MenuAccess = new RoleHasMenuAccess;

            $MenuAccess->role_id    = $role;
            $MenuAccess->group_id   = $group_id;
            $MenuAccess->menu_id    = $menu;

            $MenuAccess->save();
        }

        return back()->withSuccess('Menu access updated successfully.');
    }


    public function RoleMenuAccess($id)
    {
        global $rid;

        $check = RoleHasMenuAccess::where('role_id',$rid)->where('menu_id',$id)->value('menu_id');
        return $check;
    }
}
