<?php

namespace App\Http\Livewire\Admin\Galleries;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class ListGallery extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $galleries = [];

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
    }

    public function Searching()
    {
        return Gallery::where(function ($query){
           return  $query->whereHas('center' , function ($query){
               return $query->where('name' , 'like' , '%' . $this->search . '%')->where('is_remove' , 0);
           })->orWhereHas('user' , function ($query){
               return $query->where('username' , 'like' , '%' . $this->search . '%')->where('block_status' , 0);
           });
        })->latest()->paginate($this->pagination);
    }

    private function selectGalleries(): void
    {
        $this->galleries = $this->search != '' ? $this->Searching() : Gallery::latest()->paginate($this->pagination);
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
        $this->selectGalleries();
        return view('livewire.admin.galleries.list-gallery' , ['galleries' => $this->galleries]);
    }
}
