<?php

namespace App\Http\Livewire\Admin\CloseTickets;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class ListCloseTicket extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $tickets = [];

    private function Searching()
    {
        return Ticket::where(function ($query){
            return $query->where('title' , 'like' , '%' . $this->search . '%')
                ->orWhereHas('questions' , function ($query){
                    return $query->where('text' , 'like' , '%' . $this->search . '%');
                })
                ->OrWhereHas('answers' , function ($query){
                    return $query->where('text' , 'like' , '%' . $this->search . '%');
                })
                ->OrWhereHas('user' , function ($query){
                    return $query->where('username' , 'like' , '%' . $this->search . '%');
                });
        })->where('status' , 1)
            ->latest()->paginate($this->pagination);
    }
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
    }

    public function open(Ticket $ticket)
    {
        $ticket->update(['status' => 0]);
    }

    private function selectTickets(): void
    {
        $this->tickets = $this->search != '' ? $this->Searching()
            : Ticket::where('status', 1)->latest()->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function render()
    {
        $this->selectTickets();
        return view('livewire.admin.close-tickets.list-close-ticket' , ['tickets' => $this->tickets]);
    }
}
