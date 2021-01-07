<?php

namespace App\Http\Livewire\Admin\States;

use App\Models\State;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FormState extends Component
{
    public $titlePage = '';
    public $type = '';

    public $state;
    public $state_id , $name , $slug;

    private $validation_rules = [
        'name' => 'required',
        'slug' => 'required'
    ];

    private function validation()
    {
        return $this->validate($this->validation_rules);
    }

    private function validationSlug(State $state): void
    {
        if ($state->slug != $this->slug && State::query()->where('slug', $this->slug)->first()) {
            throw  ValidationException::withMessages(['slug' => 'این نامک قبلا انتخاب شده است']);
        }
    }

    private function getDataForEdit()
    {
        $this->state_id = $this->state->id;
        $this->name = $this->state->name;
        $this->slug = $this->state->slug;
    }

    public function updated($propertyName)
    {
        $propertyName == 'name' && $this->slug = $this->name;
        $this->slug = str_replace(' ' ,'-' , $this->slug);
    }

    public function store()
    {
        $this->validation_rules['slug'] .= '|unique:states';
        $data = $this->validation();

        State::create($data);

        \Request::session()->flash('message', "استان ($this->name) با موفقیت ثبت شد. ");
        return redirect(route('states.index'));
    }

    public function edit(State $state)
    {
        $this->validationSlug($state);

        $data = $this->validation();
        $state->update($data);

        \Request::session()->flash('message', "استان ($this->name) با موفقیت ویرایش شد. ");
        return redirect(route('states.index'));
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        return view('livewire.admin.states.form-state');
    }
}
