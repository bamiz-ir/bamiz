<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FormRole extends Component
{
    public $titlePage = '';
    public $type = '';

    public $role;

    public $role_id;
    public $name;
    public $permission_id = [];

    private function getDataForEdit()
    {
        $this->role_id = $this->role->id;
        $this->name = $this->role->name;
        $this->permission_id = $this->role->permissions->toArray();

        foreach ($this->permission_id as $p)
        {
            array_push($this->permission_id , $p['id']);
        }
    }

    public function mount()
    {
        $this->type == 'edit' &&  $this->getDataForEdit();
    }

    private function selectPermissions()
    {
        return Permission::all();
    }

    public function render()
    {
        $permissions = $this->selectPermissions();
        return view('livewire.admin.roles.form-role' , ['permissions' => $permissions]);
    }
}
