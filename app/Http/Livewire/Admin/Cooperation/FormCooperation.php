<?php

namespace App\Http\Livewire\Admin\Cooperation;

use Livewire\Component;

class FormCooperation extends Component
{
    public $titlePage = '';
    public $type = '';

    public $cooperation_id;
    public $cooperation;

    public $name;
    public $family;
    public $phone;
    public $description;
    public $address;

    private function getDataForEdit()
    {
        $this->cooperation_id = $this->cooperation->id;
        $this->name = $this->cooperation->name;
        $this->family = $this->cooperation->family;
        $this->description = $this->cooperation->description;
        $this->phone = $this->cooperation->phone;
        $this->address = $this->cooperation->address;
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        return view('livewire.admin.cooperation.form-cooperation');
    }
}
