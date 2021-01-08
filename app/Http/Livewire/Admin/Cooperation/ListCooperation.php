<?php

namespace App\Http\Livewire\Admin\Cooperation;

use App\Models\Cooperation;
use Livewire\Component;
use Livewire\WithPagination;

class ListCooperation extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;

    protected $cooperations;

    private function getData()
    {
        $this->cooperations = Cooperation::query()->latest()->paginate($this->pagination);
    }

    public function destroy(Cooperation $cooperation)
    {
        $cooperation->delete();
    }

    public function render()
    {
        $this->getData();
        return view('livewire.admin.cooperation.list-cooperation' , ['cooperations' => $this->cooperations]);
    }
}
