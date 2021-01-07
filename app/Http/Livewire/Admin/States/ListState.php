<?php

namespace App\Http\Livewire\Admin\States;

use App\Models\City;
use App\Models\State;
use Livewire\Component;
use Livewire\WithPagination;

class ListState extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $states = [];

    public function destroy(State $state)
    {
        $state->delete();
    }

    public function Searching()
    {
        return State::where('name' , 'like' , '%' . $this->search . '%')
            ->orWhere('slug' , 'like' , '%' . $this->search . '%')
            ->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectStates();

        return view('livewire.admin.states.list-state' , ['states' => $this->states]);
    }

    private function selectStates(): void
    {
        $this->states = $this->search != '' ? $this->Searching() : State::latest()->paginate($this->pagination);
    }
}
