<?php

namespace App\Http\Livewire\Admin\Worktimes;

use App\Models\WorkTime;
use Livewire\Component;
use Livewire\WithPagination;

class ListWorktime extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $worktimes = [];

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(WorkTime $workTime)
    {
        $workTime->delete();
    }

    private function Searching()
    {
        return WorkTime::where(function ($query){
            $query->orWhere('fromHour' , 'like' , '%' . $this->search . '%')
                ->orWhere('toHour' , 'like' , '%' . $this->search . '%');
        })->orWhereHas('center' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%')->where('is_remove' , 0);
            })->latest()->paginate($this->pagination);
    }

    private function selectWorkTimes(): void
    {
        $this->worktimes = $this->search != '' ? $this->Searching() : WorkTime::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectWorkTimes();
        return view('livewire.admin.worktimes.list-worktime' , ['worktimes' => $this->worktimes]);
    }
}
