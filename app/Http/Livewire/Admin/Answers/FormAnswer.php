<?php

namespace App\Http\Livewire\Admin\Answers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Ticket;
use Livewire\Component;

class FormAnswer extends Component
{
    public $titlePage = '';
    public $type;

    public $answer;
    public $questions = [];

    public $current_question;

    public $answer_id;
    public $question_id;
    public $ticket_id;
    public $text;

    private function getDataForEdit()
    {
        $this->answer_id = $this->answer->id;
        $this->ticket_id = $this->answer->ticket_id;
        $this->text = $this->answer->text;
        $this->question_id = $this->answer->question_id;

        $this->getCurrentQuestionInfo();

        $this->questions = Question::all();
    }

    private function getCurrentQuestionInfo()
    {
        $this->current_question = Question::GetCurrentQuestion($this->question_id);
    }

    private function selectQuestionsByTicketID(): void
    {
        $this->questions = Question::query()->where('ticket_id', $this->ticket_id)->get();
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'ticket_id')
        {
            $this->selectQuestionsByTicketID();
            $this->type != 'edit' &&  $this->questions = $this->questions->where('is_answered', false);

            $this->question_id = $this->current_question = null;
        }

        isset($this->question_id) && $this->getCurrentQuestionInfo();
    }

    private function selectTickets()
    {
        return Ticket::query()->where('status', 0)->get();
    }

    public function render()
    {
        $tickets = $this->selectTickets();
        return view('livewire.admin.answers.form-answer', ['tickets' => $tickets]);
    }
}
