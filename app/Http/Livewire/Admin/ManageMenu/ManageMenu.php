<?php

namespace App\Http\Livewire\Admin\ManageMenu;

use App\Models\Admin\Menu;
use Livewire\Component;

class ManageMenu extends Component
{
    public function render()
    {
        $lists = Menu::select('menus.*')
        ->join('menu_groups', 'menu_groups.id', '=', 'menus.menu_groups_id')
        ->orderBy('menu_groups.order')
        ->orderBy('menus.order')
        ->get();

        return view('livewire.admin.manage-menu.manage-menu',[
            'lists' => $lists
        ]);
    }

    public function changeStatus($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->active = $menu->active == true ? false : true;

        $menu->save();

        return back()->withSuccess('Status changed successfully');
    }
}
