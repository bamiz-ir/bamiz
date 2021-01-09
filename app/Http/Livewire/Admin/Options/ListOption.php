<?php

namespace App\Http\Livewire\Admin\Options;

use App\Models\Option;
use Livewire\Component;
use Livewire\WithPagination;

class ListOption extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $options = [];

    public function Searching()
    {
        return Option::where(function ($query){
            return $query->where('title' , 'like' , '%' . $this->search . '%')
                ->OrWhere('price' , 'like' , '%' . $this->search . '%')
                ->OrWhere('description' , 'like' , '%' . $this->search . '%')
                ->OrWhereHas('center' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%');
                });
        })->where('is_remove' , 0)->latest()->paginate($this->pagination);
    }

    public function destroy(Option $option)
    {
         $option->update(['is_remove' => true ]);
    }

    private function selectOptions(): void
    {
        $this->options = $this->search != '' ? $this->Searching() :
            Option::where('is_remove', 0)->latest()->paginate($this->pagination);
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
        $this->selectOptions();
        return view('livewire.admin.options.list-option' , ['options' => $this->options]);
    }
}
