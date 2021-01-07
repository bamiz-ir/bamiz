<?php

namespace App\Http\Livewire\Admin\Questions;

use App\Models\Ticket;
use Livewire\Component;

class FormQuestion extends Component
{
    public $titlePage = '';
    public $type = '';

    public $question;

    public $question_id;
    public $ticket_id;
    public $text;

    private function getDataForEdit()
    {
        $this->question_id = $this->question->id;
        $this->ticket_id = $this->question->ticket_id;
        $this->text = $this->question->text;
    }

    public function mount()
    {
        $this->type == 'edit'  &&  $this->getDataForEdit();
    }

    private function selectTickets()
    {
        return Ticket::query()->where('status', 0)->get();
    }

    public function render()
    {
        $tickets = $this->selectTickets();
        return view('livewire.admin.questions.form-question' , ['tickets' => $tickets]);
    }
}
