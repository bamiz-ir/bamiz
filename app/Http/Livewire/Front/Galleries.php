<?php

namespace App\Http\Livewire\Front;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class Galleries extends Component
{
    use WithPagination;

    protected $galleries;

    public $pagination = 16;
    protected $paginationTheme = 'bootstrap';

    private function getData()
    {
        $this->galleries = Gallery::query()->where('type' , 'image')->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->getData();
        return view('livewire.front.galleries' , ['galleries' => $this->galleries]);
    }
}
