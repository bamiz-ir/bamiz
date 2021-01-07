<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        return view('Admin.States.index');
    }

    public function create()
    {
        return view('Admin.States.create');
    }

    public function edit(State $state)
    {
        return view('Admin.States.edit' , compact('state'));
    }

}
