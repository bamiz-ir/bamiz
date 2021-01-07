<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Answers;
use App\Models\Question;
use App\Models\User;
use Livewire\Component;

class FormTicket extends Component
{
    public $titlePage = '';
    public $type = '';

    public $ticket;

    public $ticket_id;
    public $title;
    public $text;
    public $user_id;
    public $status;

    private function getDataForEdit()
    {
        $this->ticket_id = $this->ticket->id;
        $this->title = $this->ticket->title;
        $this->text = Question::query()->where('ticket_id' , $this->ticket->id)->first()->text;
        $this->user_id = $this->ticket->user_id;
        $this->status = $this->ticket->status;
    }

    public function mount()
    {
        $this->type == 'edit'  &&  $this->getDataForEdit();
    }

    private function selectUsers()
    {
        return User::query()->where('block_status', 0)->get();
    }

    public function render()
    {
        $users = $this->selectUsers();
        return view('livewire.admin.tickets.form-ticket' , ['users' => $users]);
    }
}
