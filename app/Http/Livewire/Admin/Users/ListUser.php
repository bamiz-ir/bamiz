<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListUser extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $users;

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(User $user)
    {
        $user->update(['block_status' => true]);
    }

    public function Searching()
    {
        return User::where(function ($query){

            return $query->where('name' , 'like' , '%' . $this->search . '%')
                ->orWhere('username' , 'like' , '%' . $this->search . '%')
                ->orWhere('lastName' , 'like' , '%'. $this->search . '%')
                ->orWhere('email' , 'like' , '%' . $this->search . '%')
                ->orWhere('phone' , 'like' , '%' . $this->search . '%');

        })->where('block_status' , 0)->latest()->paginate($this->pagination);
    }

    private function selectUsers(): void
    {
        $this->users = $this->search != '' ? $this->Searching() : User::where('block_status', 0)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectUsers();
        return view('livewire.admin.users.list-user' , ['users' => $this->users]);
    }
}
