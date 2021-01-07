<?php

namespace App\Http\Livewire\Admin\Questions;

use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class ListQuestion extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $questions = [];

    private function Searching()
    {
        return Question::where('text' , 'like' , '%' . $this->search . '%')
            ->orWhereHas('ticket' , function ($query){
                return $query->where('title' , 'like' , '%' . $this->search . '%')
                    ->OrWhereHas('user' , function ($query){
                        return $query->where('username' , 'like' , '%' . $this->search . '%');
                    });
            })->latest()->paginate($this->pagination);
    }

    public function destroy(Question $question)
    {
        $question->delete();
    }

    private function selectQuestions(): void
    {
        $this->questions = $this->search != '' ? $this->Searching() : Question::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectQuestions();
        return view('livewire.admin.questions.list-question' , ['questions' => $this->questions]);
    }
}
