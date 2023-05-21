<?php

namespace App\Http\Livewire\Admin\ManageRoles;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Livewire\Component;

class CreateRole extends Component
{
    public $role_name;
    public $permission = [];
    public $permissions;

    protected $rules = [
        'role_name' => 'required|min:3'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->permissions = Permission::get();
    }

    public function render()
    {
        return view('livewire.admin.manage-roles.create-role');
    }

    public function submit()
    {
        $this->validate();

        $save = Role::create([
            'name' => $this->role_name
        ]);

        $save->syncPermissions($this->permission);

        if($save->exists){
            session()->flash('success','Data saved successfully!');
        }else{
            session()->flash('fail','Error, failed to save!');
        }

        return redirect()->route('ManageRolesController@index');
    }
}
