<?php

namespace App\Http\Livewire\Admin\ManageUser;

use App\Models\Admin\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $search = "";
    public $name = "";
    public $username = "";
    public $email = "";
    public $mobile = "";
    public $sortBy = 'name';
    public $sortOrder = 'asc';

    // protected $queryString = ['sortBy','sortOrder'];

    public function sortBy($fields)
    {
        if($this->sortBy === $fields){
            $this->sortOrder = $this->sortOrder === 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortOrder = 'asc';
        }
        $this->sortBy = $fields;
    }

    public function render()
    {
        return view('livewire.admin.manage-user.user-list',[

            'users' => User::search('name',$this->search)->with('roles')->orderBy($this->sortBy, $this->sortOrder)->paginate('50')
        ]);
    }
}
