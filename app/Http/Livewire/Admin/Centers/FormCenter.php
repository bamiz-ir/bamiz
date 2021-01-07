<?php

namespace App\Http\Livewire\Admin\Centers;

use App\Models\Category;
use App\Models\Center;
use App\Models\City;
use App\Models\State;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FormCenter extends Component
{
     public $titlePage = '';
     public $type = '';

     public $center_id;
     public $state_id;
     public $city_id;
     public $name;
     public $slug;
     public $images;
     public $description;
     public $center;
     public $chairs_people_count;

     public $cats;
     public $states = [];
     public $cities = [];

    private function GetCities()
    {
        $this->cities = City::query()->where('state_id' , $this->state_id)->get();
    }

    public function updated($propertyName)
    {
        ($propertyName == 'name' && $this->name == '')  &&  session()->flash('name_error' , 'فیلد نام اجباری است');

        $propertyName == 'state_id'  &&  $this->GetCities();
    }

    public function getDataForEdit()
    {
        $this->name = $this->center->name;
        $this->center_id = $this->center->id;
        $this->state_id = $this->center->state_id;
        $this->chairs_people_count = $this->center->chairs_people_count;
        $this->slug = $this->center->slug;
        $this->images = $this->center->images;
        $this->description = $this->center->description;

        $this->GetCities();
    }

    private function Set_Required()
    {
        $this->cats = Category::query()
            ->where('is_remove' , 0)
            ->get();

        $this->states = State::all();
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        $this->Set_Required();
        return view('livewire.admin.centers.form-center');
    }
}
