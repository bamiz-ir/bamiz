<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Center;
use Livewire\Component;

class FormProduct extends Component
{
    public $titlePage = '';
    public $type = '';

    public $product;
    public $product_id;
    public $title;
    public $description;
    public $slug;
    public $images;
    public $price;

    private function getDataForEdit()
    {
        $this->product_id = $this->product->id;
        $this->title = $this->product->title;
        $this->description = $this->product->description;
        $this->slug = $this->product->slug;
        $this->images = $this->product->images;
        $this->price = $this->product->price;
    }

    public function DeleteImage($key)
    {
        $images = $this->product->images;
        unset($images[$key]);
        $this->product->update(['images' => $images]);

        $this->mount();
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        $centers = Center::getCenters();
        return view('livewire.admin.products.form-product' , ['centers' => $centers]);
    }
}
