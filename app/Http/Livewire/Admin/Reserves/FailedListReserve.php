<?php

namespace App\Http\Livewire\Admin\Reserves;

use App\Models\Reserve;
use Livewire\Component;
use Livewire\WithPagination;

class FailedListReserve extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $search = '';
    public $pagination = 5;

    protected $reserves = [];

    private function getData()
    {
        return Reserve::query()->where('status' , 0)->latest()->paginate($this->pagination);
    }

    public function destroy(Reserve $reserve)
    {
        $reserve->delete();
    }

    public function success(Reserve $reserve)
    {
        $reserve->update(['status' => true]);
    }

    public function render()
    {
        $this->reserves = $this->getData();
        return view('livewire.admin.reserves.failed-list-reserve' , ['reserves' => $this->reserves]);
    }
}
