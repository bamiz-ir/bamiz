<?php

namespace App\Http\Livewire\Front;

use App\Http\Controllers\traits\PageStaticValues;
use Livewire\Component;

class ContactUs extends Component
{
    use PageStaticValues;

    public $page_info;

    private function getData()
    {
        $this->page_info['phone'] = $this->CreateOrShowSettingData('phone' , '021-2000000');
        $this->page_info['email'] = $this->CreateOrShowSettingData('email' , 'bamiz.ir@gmail.com');
        $this->page_info['address'] = $this->CreateOrShowSettingData('address' , 'قزوین ، پارک علم و فناوری');
    }

    public function render()
    {
        $this->getData();
        return view('livewire.front.contact-us');
    }
}
