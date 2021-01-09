<?php

namespace App\Http\Livewire\Admin\Reserves;

use App\Models\Reserve;
use Livewire\Component;
use Livewire\WithPagination;

class ListReserve extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $reserves = [];

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(Reserve $reserve)
    {
        $reserve->update(['status' => false]);
    }

    private function Searching()
    {
        return Reserve::where(function ($query){
            return $query->where('time' , 'like' , '%' . $this->search . '%')
                ->orWhere('date' , 'like' , '%' . $this->search . '%')
                ->orWhere('guest_count' , 'like' , '%' . $this->search . '%')
                ->orWhereHas('chairs' , function ($query){
                    return $query->where('number' , 'like' , '%' . $this->search . '%')->where('is_remove' , 0);
                })->orWhereHas('center' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%')->where('is_remove' , 0);
                })->orWhereHas('user' , function ($query){
                    return $query->where('username' , 'like' , '%' . $this->search . '%')->where('block_status' , 0);
                })->OrWhereHas('products' , function ($query){
                    return $query->where('title' , 'like' , '%'. $this->search . '%');
                })->OrWhereHas('options' , function ($query){
                    return $query->where('title' , 'like' , '%' . $this->search . '%');
                })->OrWhere('price' , 'like' , '%' . $this->search . '%')
                ->where('status' , 1);
        })->latest()->paginate($this->pagination);
    }

    private function selectReserves(): void
    {
        $this->reserves = $this->search != '' ? $this->Searching() : $this->reserves = Reserve::where('status' , 1)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectReserves();
        return view('livewire.admin.reserves.list-reserve' , ['reserves' => $this->reserves]);
    }
}
