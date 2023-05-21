<?php

namespace App\Http\Livewire\Admin\ManageUser;

use App\Models\Admin\Role;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class AddUser extends Component
{
    public $name;
    public $email;
    public $username;
    public $mobile;
    public $role;
    public $active = [];

    public function render()
    {
        return view('livewire.admin.manage-user.add-user',[
            'roles' => Role::get()
        ]);
    }

    protected $rules = [
        'name'     => 'required|min:6',
        'email'    => 'required|email|unique:users',
        'username' => 'required|unique:users',
        'mobile'   => 'required|numeric',
        'role'     => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        // Random 10 digit password
        $password = Str::random(10);

        $role = Role::findOrFail($this->role);

        $user = User::create([
            'name'       => $this->name,
            'username'   => $this->username,
            'email'      => $this->email,
            'mobile'     => $this->mobile,
            'role_id'    => $role->id,
            'password'   => Hash::make($password),
            'active'     => $this->active ? true : false
        ]);

        if($user->exists){

            // Assign Role
            $user->syncRoles($role);

            //Password to Email

            //return message
            session()->flash('success','User Added successfully, Password = '.$password);
        }else{
            session()->flash('fail','Failed, something went wrong!');
        }

        return redirect()->route('ManageUsersController@index');
    }
}
