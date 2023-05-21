<?php

namespace App\Http\Livewire\Admin\ManageUser;

use App\Models\Admin\Role;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{
    public $name;
    public $email;
    public $username;
    public $mobile;
    public $password;
    public $role;
    public $userId;
    public $active = [];

    public $roleId;

    public $alert = false;

    protected $rules = [
        'name'     => 'required|min:6',
        'mobile'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',
        'role'     => 'required',
        'password' =>   [
            'sometimes',
            'nullable',
            'string',
            'min:7',              // must be at least 7 characters in length
            'regex:/[a-z]/',      // must contain at least one lower letter
            'regex:/[0-9]/',      // must contain at least one digit
            // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
            // 'regex:/[@$!%*#?&]/', // must contain a special character
        ],
    ];

    public function mount($id)
    {
        $user           = User::findOrFail($id);
        $this->userId   = $user->id;
        $this->name     = $user->name;
        $this->email    = $user->email;
        $this->username = $user->username;
        $this->mobile   = $user->mobile;
        $this->role     = $user->role_id;
        $this->active   = $user->active;

        $this->roleId = $this->userId;
    }

    public function closeAlert()
    {
        $this->alert = false;
    }

    public function render()
    {
        return view('livewire.admin.manage-user.edit-user',[
            'roles' => Role::get()
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $role = Role::findOrFail($this->role);

        $user = User::findOrFail($this->userId);

        if(isset($this->password)) {

            $user->password  = Hash::make($this->password);
        }

        $user->name       = $this->name;
        $user->mobile     = $this->mobile;
        $user->role_id    = $role->id;
        $user->active     = $this->active ? true : false;

        if($user->save()){

            // Assign Role
            $user->syncRoles($role);

            //Password to Email

            //return message
            session()->flash('success','User updated successfully');
        }else{
            session()->flash('fail','Failed, something went wrong!');
        }

        $this->alert = true;
    }

    public function close()
    {
        $this->reset();
    }
}
