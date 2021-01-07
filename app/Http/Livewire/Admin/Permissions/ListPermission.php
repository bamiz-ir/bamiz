<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class ListPermission extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    private function Searching()
    {
        return Permission::where('name' , 'like' , '%' . $this->search . '%')
            ->latest()->paginate($this->pagination);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
    }

    private function selectPermissions()
    {
        return $this->search != '' ? $this->Searching()
            : Permission::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $permissions = $this->selectPermissions();
        return view('livewire.admin.permissions.list-permission' , ['permissions' => $permissions]);
    }
}
