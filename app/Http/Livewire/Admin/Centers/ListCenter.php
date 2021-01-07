<?php

namespace App\Http\Livewire\Admin\Centers;

use App\Models\Center;
use Livewire\Component;
use Livewire\WithPagination;

class ListCenter extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $centers;

    public function Searching()
    {
        return Center::where(function ($query){
            return $query->where('name' , 'like' , '%' . $this->search . '%')
                ->orWhereHas('state' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%')
                        ->OrWhere('slug' , 'like' , '%' .  $this->search . '%');
                })->orWhereHas('city' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%')
                        ->OrWhere('slug' , 'like' , '%' . $this->search . '%');
                })->orWhereHas('category' , function ($query){
                    return $query->where('title' , 'like' , '%' . $this->search . '%')->where('chid' , '!=' , 0);
                })->orWhereHas('user' , function ($query){
                    return $query->where('username' , 'like' , '%' . $this->search . '%')->where('block_status' , 0);
                })
                ->OrWhere('chairs_people_count' , 'like' , '%' . $this->search . '%');
        })->where('is_remove' , 0)->latest()->paginate($this->pagination);
    }

    public function destroy(Center $center)
    {
        $center->update(['is_remove' => true]);
    }

    private function selectCenters(): void
    {
        $this->centers = $this->search != ''
            ? $this->Searching()
            : Center::where('is_remove', 0)
                ->latest()
                ->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectCenters();
        return view('livewire.admin.centers.list-center' , ['centers' => $this->centers]);
    }
}
