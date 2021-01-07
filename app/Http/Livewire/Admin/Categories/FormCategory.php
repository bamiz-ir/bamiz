<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Request;

class FormCategory extends Component
{
    public $titlePage = '';
    public $pagination = 5;
    public $categories = [];
    public $search = '';
    public $type;

    // Create Properties
    public $chid = 0;

    // Update Properties
    public $category;

    public $cat_id;
    public $title;
    public $slug;
    public $images = [];

    public function updated($propertyName)
    {
        $propertyName == 'title' && $this->slug = $this->title;
        $this->slug = str_replace(' ', '-', $this->slug);
    }

    private function getDataForEdit()
    {
        $this->title = $this->category->title;
        $this->slug = $this->category->slug;
        $this->chid = $this->category->chid;
        $this->cat_id = $this->category->id;
        $this->images = $this->category->images;
    }

    public function mount()
    {
        $this->type == 'edit'  && $this->getDataForEdit();
    }

    public function render()
    {
        $this->categories = Category::query()->where('chid', 0)
             ->where('is_remove', '=', 0)->get();

        return view('livewire.admin.categories.form-category');
    }
}
