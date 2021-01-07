<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('Admin.Tickets.index');
    }

    public function create()
    {
        return view('Admin.Tickets.create');
    }

    public function store(TicketRequest $request)
    {
        $ticket = Ticket::create($request->all());
        $ticket->questions()->create(['text' => $request->text,]);

        \Request::session()->flash('message', "تیکت ($request->title) با موفقیت ثبت شد. ");
        return  redirect(route('tickets.index'));
    }

    public function edit(Ticket $ticket)
    {
        return view('Admin.Tickets.edit' , compact('ticket'));
    }

    public function update(TicketRequest $request, Ticket $ticket)
    {
        $ticket->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
        ]);
        $ticket->questions()->update([
            'text' => $request->text,
        ]);

        \Request::session()->flash('message', "تیکت ($request->title) با موفقیت ویرایش شد. ");
        return redirect(route('tickets.index'));
    }
}
