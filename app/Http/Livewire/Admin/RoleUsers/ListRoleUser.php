<?php

namespace App\Http\Livewire\Admin\RoleUsers;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListRoleUser extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $role_users = [];

    private function Searching()
    {
        return User::where(function ($query) {
            return $query->where('username', 'like', '%' . $this->search . '%')
                ->OrWhere('email', 'like', '%' . $this->search . '%')
                ->OrWhere('name', 'like', '%' . $this->search . '%')
                ->OrWhereHas('roles', function ($query) {
                    return $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->where('block_status', 0)
                ->where('level', 'admin')
                ->where('active', 1);
        })->with('roles')->latest()->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(User $user)
    {
        foreach ($user->roles as $role) {
            $user->removeRole($role);
        }
    }

    private function selectRole_Users(): void
    {
        $this->role_users = $this->search != '' ? $this->Searching()
            : User::where('block_status', 0)
                ->where('level', 'admin')->with('roles')->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectRole_Users();
        return view('livewire.admin.role-users.list-role-user', ['role_users' => $this->role_users]);
    }
}
