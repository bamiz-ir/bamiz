<?php

namespace App\Http\Livewire\Admin\Cooperation;

use App\Models\Cooperation;
use Livewire\Component;
use Livewire\WithPagination;

class ListCooperation extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $cooperations;

    private function getData()
    {
        return Cooperation::latest()->paginate($this->pagination);
    }

    private function Searching()
    {
        return Cooperation::where(function ($query){
           return $query->where('name' , 'like' , '%' .  $this->search .'%')
               ->OrWhere('family' , 'like' , '%' .  $this->search .'%')
               ->OrWhere('phone' , 'like' , '%' .  $this->search .'%')
               ->OrWhere('address' , 'like' , '%' .  $this->search .'%')
               ->OrWhere('description' , 'like' , '%' .  $this->search .'%');
        })->latest()->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(Cooperation $cooperation)
    {
        $cooperation->delete();
    }

    public function render()
    {
        $this->cooperations = $this->search != '' ?  $this->Searching() :  $this->getData();
        return view('livewire.admin.cooperation.list-cooperation' , ['cooperations' => $this->cooperations]);
    }
}
