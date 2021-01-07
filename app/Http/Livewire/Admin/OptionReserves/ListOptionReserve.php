<?php

namespace App\Http\Livewire\Admin\OptionReserves;

use App\Models\Option;
use App\Models\OptionReserve;
use Livewire\Component;
use Livewire\WithPagination;

class ListOptionReserve extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $search = '';
    public $pagination = 5;
    protected $option_reserved = [];

    public function Searching()
    {
        return OptionReserve::whereHas('option' , function ($query){
            return $query->where('title' , 'like' , '%' . $this->search . '%')->where('is_remove' , 0);
        })->OrwhereHas('reserve' , function ($query){
            return $query->whereHas('center' , function ($query){
                return $query->where('name' , 'like' , '%' . $this->search . '%')->where('is_remove' , 0);
            })->OrWhereHas('user' , function ($query){
                return $query->where('username' , 'like' , '%' . $this->search . '%')->where('block_status' , 0);
            });
        })->latest()->paginate($this->pagination);
    }

    public function destroy(OptionReserve $optionReserve)
    {
        $optionReserve->delete();
    }

    private function selectOptionReserves(): void
    {
        $this->option_reserved = $this->search != '' ? $this->Searching() : OptionReserve::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectOptionReserves();
        return view('livewire.admin.option-reserves.list-option-reserve' , ['option_reserved' => $this->option_reserved]);
    }
}
