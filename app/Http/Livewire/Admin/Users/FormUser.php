<?php

namespace App\Http\Livewire\Admin\Users;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormUser extends Component
{
    public $titlePage;
    public $type = '';

    public $user;

    public $user_id;
    public $name;
    public $lastName;
    public $username;
    public $password;
    public $email;
    public $level;
    public $block_status;
    public $active;
    public $phone;
    public $profile_photo_path;

    public function getDataForEdit()
    {
        $this->user_id = $this->user->id;
        $this->name = $this->user->name;
        $this->lastName = $this->user->lastName;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->level = $this->user->level;
        $this->block_status = $this->user->block_status;
        $this->active = $this->user->email_verified_at != null && 1;
        $this->phone = $this->user->phone;
        $this->profile_photo_path = $this->user->profile_photo_path;
    }

    public function mount()
    {
       $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        return view('livewire.admin.users.form-user');
    }
}
