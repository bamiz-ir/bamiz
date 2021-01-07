<?php

namespace App\Http\Livewire\Admin\TrashChairs;

use App\Models\Center;
use App\Models\Chair;
use Livewire\Component;
use Livewire\WithPagination;

class ListTrashChair extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $chairs = [];

    private function Searching()
    {
        return Chair::where(function ($query){
            return $query->where('number' , 'like' , '%' . $this->search . '%')
                ->OrWhereHas('center' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%')
                        ->OrWhereHas('user' , function ($query){
                            return $query->where('username' , 'like' , '%' . $this->search . '%');
                        });
                });
        })->where('is_remove' , 1)->latest()->paginate($this->pagination);
    }

    public function destroy(Chair $chair)
    {
        $chair->delete();
    }

    public function restore(Chair $chair)
    {
        $chair->update(['is_remove' => 0]);
    }

    private function selectTrashChairs(): void
    {
        $this->chairs = $this->search != '' ? $this->Searching() : Chair::where('is_remove', 1)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectTrashChairs();
        return view('livewire.admin.trash-chairs.list-trash-chair' , ['chairs' => $this->chairs]);
    }
}
