<?php

namespace App\Http\Livewire\Admin\ContactUs;

use Livewire\Component;

class FormContactus extends Component
{
    public $titlePage = '';
    public $type = '';

    public $contactUs;
    public $contact_us_id;

    public $name;
    public $lastName;
    public $email;
    public $title;
    public $text;

    private function getDataForEdit()
    {
        $this->contact_us_id = $this->contactUs->id;
        $this->name = $this->contactUs->name;
        $this->lastName = $this->contactUs->lastName;
        $this->email = $this->contactUs->email;
        $this->title = $this->contactUs->title;
        $this->text = $this->contactUs->text;
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        return view('livewire.admin.contact-us.form-contactus');
    }
}
