<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Ticket;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('Admin.Questions.index');
    }

    public function create()
    {
        return view('Admin.Questions.create');
    }

    public function store(QuestionRequest $request)
    {
        $question = Question::create([
            'text' => $request->text,
            'ticket_id' => $request->ticket_id
        ]);

        \Request::session()->flash('message', "پرسش تیکت ({$question->ticket->title}) با موفقیت ثبت شد. ");
        return redirect(route('questions.index'));
    }

    public function edit(Question $question)
    {
        return view('Admin.Questions.edit' , compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $question->update([
            'text' => $request->text,
            'ticket_id' => $request->ticket_id
        ]);

        \Request::session()->flash('message', "پرسش تیکت ({$question->ticket->title}) با موفقیت ویرایش شد. ");
        return redirect(route('questions.index'));
    }
}
