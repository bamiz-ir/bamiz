<?php

namespace App\Http\Livewire\Admin\Options;

use App\Models\Center;
use Livewire\Component;

class FormOption extends Component
{

    public $titlePage = '';
    public $type = '';

    public $option;

    public $option_id;
    public $title;
    public $slug;
    public $price;
    public $description;
    public $center;
    public $images;

    private function getDataForEdit()
    {
        $this->option_id = $this->option->id;
        $this->title = $this->option->title;
        $this->slug = $this->option->slug;
        $this->price = $this->option->price;
        $this->description = $this->option->description;
        $this->center = $this->option->center;
        $this->images = $this->option->images;
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        $centers = Center::getCenters();
        return view('livewire.admin.options.form-option' , ['centers' => $centers]);
    }
}
