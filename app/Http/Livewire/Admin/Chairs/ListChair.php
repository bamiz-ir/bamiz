<?php

namespace App\Http\Livewire\Admin\Chairs;

use App\Models\Chair;
use Livewire\Component;
use Livewire\WithPagination;

class ListChair extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $chairs = [];

    private function Searching()
    {
        return Chair::where(function ($query){

            $query->where('number' , 'like' , '%' . $this->search . '%')
                ->orWhereHas('center' , function ($query) {
                    return $query->where('name', 'like', '%' . $this->search . '%')->where('is_remove' , 0);
                });

        })->where('is_remove' , 0)
            ->latest()->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(Chair $chair)
    {
        $chair->update(['is_remove' => true]);
    }

    private function selectChairs(): void
    {
        $this->chairs = $this->search != '' ? $this->Searching() : Chair::where('is_remove', 0)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectChairs();
        return view('livewire.admin.chairs.list-chair' , ['chairs' => $this->chairs]);
    }
}
