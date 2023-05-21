<?php
namespace App\Aliases;

use App\Models\Admin\Menu;
use App\Models\Admin\MenuGroup;
use App\Models\Admin\Role;

class Sidebar
{
    public static function getMenu()
    {
        $menuGroup = MenuGroup::query();
        $menus     = Menu::query();

        // 'admin' username will have full menu access dispite of role restriction
        if(auth()->user()->username != 'admin'){

            $role = Role::findOrFail(auth()->user()->role_id);

            $menuGroup = $menuGroup->where('role_has_menu_access.role_id',$role->id);
            $menus = $menus->where('role_has_menu_access.role_id',$role->id);
        }

        $menuGroup = $menuGroup->select('menu_groups.title','menu_groups.id')
                    ->leftJoin('role_has_menu_access','role_has_menu_access.group_id','=','menu_groups.id')
                    ->groupBy('menu_groups.title','menu_groups.id')
                    ->where('active',true)
                    ->orderBy('menu_groups.order')
                    ->get();

        $menus = $menus->select('menus.*')
                    ->leftJoin('role_has_menu_access','role_has_menu_access.menu_id','=','menus.id')
                    ->where('active',true)
                    ->orderBy('menus.order')
                    ->get();

        return $Menu = [
            'groups' => $menuGroup,
            'menus'    => $menus,
        ];
    }
}
