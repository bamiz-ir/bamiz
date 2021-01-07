<?php

namespace App\Http\Livewire\Admin\Answers;

use App\Models\Answer;
use Livewire\Component;
use Livewire\WithPagination;

class ListAnswer extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $answers = [];

    private function Searching()
    {
        return Answer::where(function ($query){
            return $query->where('text' , 'like' , '%' . $this->search . '%')
                ->orWhereHas('ticket' , function ($query){
                    return $query->where('title' , 'like' , '%' . $this->search . '%');
                })
                ->OrWhereHas('user' , function ($query){
                    return $query->where('username' , 'like' , '%' .$this->search . '%');
                })
                ->OrWhereHas('question' , function ($query){
                    return $query->where('text' , 'like' , '%' . $this->search . '%');
                });
        })->latest()
            ->paginate($this->pagination);
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
    }

    private function selectAnswers(): void
    {
        $this->answers = $this->search != ''
            ? $this->Searching()
            : Answer::latest()
                ->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectAnswers();
        return view('livewire.admin.answers.list-answer' , ['answers' => $this->answers]);
    }
}
