<?php

namespace App\Http\Livewire\Admin\Cities;

use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;

class ListCity extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $cities = [];

    public function destroy(City $city)
    {
        $city->delete();
    }

    public function Searching()
    {
        return City::where(function ($query){
            return $query->where('name' , 'like' , '%' . $this->search . '%')
                ->OrWhere('slug' , 'like' , '%' . $this->search . '%')
                ->OrWhereHas('state' , function($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%');
                });
        })->latest()->paginate($this->pagination);
    }

    private function selectCities(): void
    {
        $this->cities = $this->search != '' ? $this->Searching() : City::latest()->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function render()
    {
        $this->selectCities();
        return view('livewire.admin.cities.list-city' , ['cities' => $this->cities]);
    }
}
