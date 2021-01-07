<?php

namespace App\Http\Livewire\Admin\ChairReserves;

use App\Models\ChairReserve;
use Livewire\Component;
use Livewire\WithPagination;

class ListChairReserve extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $chair_reserves = [];

    private function Searching()
    {
        return ChairReserve::query()->whereHas('chair', function ($query) {
            return $query->where('number', 'like', '%' . $this->search . '%');
        })->orWhereHas('reserve', function ($query) {
            return $query->whereHas('center', function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })
                ->OrWhereHas('user', function ($query) {
                    return $query->where('username', 'like', '%' . $this->search . '%')->where('block_status' , 0);
                });
        })->latest()->paginate($this->pagination);
    }

    public function destroy(ChairReserve $chairReserve)
    {
        $chairReserve->delete();
    }

    private function selectChair_reserves(): void
    {
        $this->chair_reserves = $this->search != '' ? $this->Searching()
            : ChairReserve::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectChair_reserves();
        return view('livewire.admin.chair-reserves.list-chair-reserve', ['chair_reserves' => $this->chair_reserves]);
    }
}
