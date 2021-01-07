<?php

namespace App\Http\Livewire\Admin\RoleUsers;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class FormRoleUser extends Component
{
    public $titlePage = '';
    public $type = '';

    public $role_user;

    public $user_id;
    public $role_id;

    private function getDataForEdit()
    {
        $this->user_id = $this->role_user->id;
        $this->role_id = $this->role_user->roles->toArray();

        foreach ($this->role_id as $r)
        {
            array_push($this->role_id  , $r['id']);
        }
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    private function selectData(): array
    {
        $users = User::query()->where('block_status', 0)->get();
        $roles = Role::all();
        return array($users, $roles);
    }

    public function render()
    {
        list($users, $roles) = $this->selectData();
        return view('livewire.admin.role-users.form-role-user' , ['users' => $users , 'roles' => $roles]);
    }
}
