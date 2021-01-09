<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ListRole extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $roles = [];

    private function Searching()
    {
        return Role::whereHas('permissions' , function ($query){
            return $query->where('name' , 'like' , '%' . $this->search . '%');
        })->orWhere('name' , 'like' , '%' .$this->search . '%')
            ->latest()->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(Role $role)
    {
        $role->delete();
    }

    private function selectRoles(): void
    {
        $this->roles = $this->search != '' ? $this->Searching()
            : Role::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectRoles();
        return view('livewire.admin.roles.list-role' , ['roles' => $this->roles]);
    }
}
