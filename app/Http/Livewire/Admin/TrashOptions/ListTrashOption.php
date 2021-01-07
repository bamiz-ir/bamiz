<?php

namespace App\Http\Livewire\Admin\TrashOptions;

use App\Models\Option;
use Livewire\Component;
use Livewire\WithPagination;

class ListTrashOption extends Component
{
    use WithPagination;

    public $titlePage  = '';
    public $pagination = 5;
    public $search = '';

    protected $options = [];

    private function Searching()
    {
        return Option::where(function ($query){
            return $query->where('title' , 'like' , '%' . $this->search . '%')
                ->OrWhere('price' , 'like' , '%' . $this->search . '%')
                ->OrWhere('description' , 'like' , '%' . $this->search . '%')
                ->OrWhereHas('center' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%');
                });
        })->where('is_remove' , 1)->latest()->paginate($this->pagination);
    }

    public function destroy(Option $option)
    {
        $option->delete();
    }

    public function restore(Option $option)
    {
        $option->update(['is_remove' => 0]);
    }

    private function selectTrashOptions(): void
    {
        $this->options = $this->search != '' ? $this->Searching()
            : Option::where('is_remove', 1)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectTrashOptions();
        return view('livewire.admin.trash-options.list-trash-option' , ['options' => $this->options]);
    }
}
