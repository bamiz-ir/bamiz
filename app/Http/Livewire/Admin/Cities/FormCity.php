<?php

namespace App\Http\Livewire\Admin\Cities;

use App\Models\City;
use App\Models\State;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FormCity extends Component
{
    public $titlePage = '';
    public $type = '';

    public $city_id , $name , $slug , $state_id;
    public $city;

    private $validation_rules = [
        'name' => 'required',
        'slug' => 'required',
        'state_id' => 'required|numeric|exists:states,id'
    ];

    private function CheckExist()
    {
        $checkSlug = $this->slug != $this->city->slug &&
            City::query()
                ->where('slug' , $this->slug)
                ->first();

        if ($checkSlug)
        {
            throw ValidationException::withMessages(['slug' => 'این نامک قبلا انتخاب شده است.']);
        }
    }

    public function getDataForEdit()
    {
        $this->city_id = $this->city->id;
        $this->name = $this->city->name;
        $this->slug = $this->city->slug;
        $this->state_id = $this->city->state_id;
    }

    public function store()
    {
        $this->validation_rules['slug'] .= '|unique:cities';

        $data = $this->validate($this->validation_rules);
        City::create($data);

        \Request::session()->flash('message', "شهر  ($this->name)  با موفقیت افزوده شد.");
        return redirect(route('cities.index'));
    }

    public function edit(City $city)
    {
        $this->CheckExist();

        $data = $this->validate($this->validation_rules);
        $city->update($data);

        \Request::session()->flash('message', "شهر  ($this->name)  با موفقیت ویرایش شد.");
        return redirect(route('cities.index'));
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function updated($propertyName)
    {
        ($propertyName == 'name') &&  $this->slug = str_replace(' ' , '-' , $this->name);
    }

    public function render()
    {
        $states = State::all();
        return view('livewire.admin.cities.form-city' , ['states' => $states]);
    }
}
