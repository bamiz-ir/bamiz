<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class FormPermission extends Component
{
    public $titlePage = '';
    public $type = '';

    public $permission;
    public $permission_id;

    public $name;

    private function validation()
    {
        return $this->validate([
            'name' => 'required|max:100',
        ]);
    }

    private function getDataForEdit()
    {
        $this->permission_id = $this->permission->id;
        $this->name = $this->permission->name;
    }

    public function store()
    {
        $data = $this->validation();
        $permission = Permission::create($data);

        \Request::session()->flash('message', "دسترسی ($permission->name) با موفقیت ثبت شد. ");
        return redirect(route('permissions.index'));
    }

    public function edit(Permission $permission)
    {
        $data = $this->validation();

        $permission->update($data);

        \Request::session()->flash('message', "دسترسی ($permission->name) با موفقیت ویرایش شد. ");
        return redirect(route('permissions.index'));
    }

    public function mount()
    {
        $this->type == 'edit'  &&  $this->getDataForEdit();
    }

    public function render()
    {
        return view('livewire.admin.permissions.form-permission');
    }
}
