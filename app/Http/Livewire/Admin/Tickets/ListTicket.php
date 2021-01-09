<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class ListTicket extends Component
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
        })->where('status' , 0)
            ->latest()->paginate($this->pagination);
    }

    public function close(Ticket $ticket)
    {
        $ticket->update(['status' => 1]);
    }

    private function selectTickets(): void
    {
        $this->tickets = $this->search != '' ? $this->Searching()
            : Ticket::where('status', 0)->latest()->paginate($this->pagination);
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
        return view('livewire.admin.tickets.list-ticket' , ['tickets' => $this->tickets]);
    }
}
