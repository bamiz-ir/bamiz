<?php

namespace App\Http\Livewire\Admin\Galleries;

use App\Models\Center;
use Livewire\Component;

class FormGallery extends Component
{
    public $titlePage = '';
    public $type = '';

    public $gallery;
    public $gallery_id;
    public $galley_type;

    private function getDataForEdit()
    {
        $this->gallery_id = $this->gallery->id;
        $this->galley_type = $this->gallery->type;
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function DeleteImage($key)
    {
        $captions = $this->gallery->captions;
        unset($captions[$key]);
        $this->gallery->update(['captions' => $captions]);

        $this->mount();
    }

    public function render()
    {
        $centers = Center::getCenters();
        return view('livewire.admin.galleries.form-gallery' , ['centers' => $centers]);
    }
}
