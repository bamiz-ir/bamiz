<?php

namespace App\Http\Livewire\Admin\TrashCenters;

use App\Models\Center;
use Livewire\Component;
use Livewire\WithPagination;

class ListTrashCenter extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $centers = [];

    private function Searching()
    {
        return Center::where(function ($query){
            return $query->where('name' , 'like' , '%' . $this->search . '%')
                ->orWhereHas('state' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%');
                })->orWhereHas('city' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%');
                })->orWhereHas('category' , function ($query){
                    return $query->where('title' , 'like' , '%' . $this->search . '%')->where('chid' , '!=' , 0);
                })->orWhereHas('user' , function ($query){
                    return $query->where('username' , 'like' , '%' . $this->search . '%')->where('block_status' , 0);
                });
        })->where('is_remove' , 1)->latest()->paginate($this->pagination);
    }

    public function destroy(Center $center)
    {
        $center->delete();
    }

    public function restore(Center $center)
    {
        $center->update(['is_remove' => 0]);
    }

    private function selectTrashCenters(): void
    {
        $this->centers = $this->search != '' ? $this->Searching()
            : Center::where('is_remove', 1)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectTrashCenters();
        return view('livewire.admin.trash-centers.list-trash-center' , ['centers' => $this->centers]);
    }
}
