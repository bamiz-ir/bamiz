<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        return view('Admin.Answers.index');
    }

    public function create()
    {
        return view('Admin.Answers.create');
    }

    public function store(AnswerRequest $request)
    {
         $answer = auth()->user()->answers()->create([
             'text' => $request->text,
             'ticket_id' => $request->ticket_id,
             'question_id' => $request->question_id,
             'is_answered' => true,
         ]);

        \Request::session()->flash('message', "پاسخ تیکت ({$answer->ticket->title}) با موفقیت ثبت شد. ");
         return  redirect(route('answers.index'));
    }

    public function edit(Answer $answer)
    {
        return view('Admin.Answers.edit' , compact('answer'));
    }

    public function update(AnswerRequest $request, Answer $answer)
    {
        $answer->question()->update(['is_answered' => false]);
        $answer->update([
            'text' => $request->text,
            'ticket_id' => $request->ticket_id,
            'question_id' => $request->question_id,
            'user_id' => auth()->user()->id,
        ]);

        $answer->question()->update(['is_answered' => true]);

        \Request::session()->flash('message', "پاسخ تیکت ({$answer->ticket->title}) با موفقیت ویرایش شد. ");
        return redirect(route('answers.index'));
    }

}
