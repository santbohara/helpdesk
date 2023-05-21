<?php

namespace App\Http\Livewire\Admin\ManageMenu;

use App\Models\Admin\Menu;
use App\Models\Admin\MenuGroup;
use Livewire\Component;

class MenuCreate extends Component
{
    public $menu_groups_id;
    public $menu_title;
    public $route_prefix;
    public $icon;
    public $order;
    public $active;
    public $groups;

    protected $rules = [
        'menu_groups_id' => 'required',
        'menu_title'     => 'required',
        'route_prefix'   => 'required',
        'icon'           => 'required',
        'order'          => 'required',
        'active'         => 'required',
    ];

    protected $messages = [
        'menu_groups_id.required' => 'Group is required.',
        'menu_title.required' => 'Menu Name is required.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->groups = MenuGroup::whereActive(true)->get();
    }

    public function render()
    {
        return view('livewire.admin.manage-menu.menu-create');
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $save = menu::create($validatedData);

        if($save->exists){
            session()->flash('success','Data saved successfully!');
        }else{
            session()->flash('fail','Error, failed to save!');
        }

        return redirect()->route('ManageMenuController@index');
    }
}
