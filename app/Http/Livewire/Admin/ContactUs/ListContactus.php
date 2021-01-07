<?php

namespace App\Http\Livewire\Admin\ContactUs;

use App\Models\ContactUs;
use Livewire\Component;
use Livewire\WithPagination;

class ListContactus extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $contact_us = [];

    private function Searching()
    {
        return ContactUs::where(function ($query){
            return $query->where('title' , 'like' , '%' . $this->search  . '%')
                ->OrWhere('text' , 'like' , '%' . $this->search  . '%')
                ->OrWhere('name' , 'like' , '%' . $this->search  . '%')
                ->OrWhere('lastName' , 'like' , '%' . $this->search  . '%')
                ->OrWhere('email' , 'like' , '%' . $this->search  . '%');
        })->latest()->paginate($this->pagination);
    }

    public function destroy(ContactUs $contactUs)
    {
        $contactUs->delete();
    }

    private function selectContactUs(): void
    {
        $this->contact_us = $this->search != 'edit' ? $this->Searching()
            : ContactUs::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectContactUs();
        return view('livewire.admin.contact-us.list-contactus' , ['contact_us' => $this->contact_us]);
    }
}
