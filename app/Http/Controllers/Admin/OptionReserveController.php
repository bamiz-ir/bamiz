<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OptionReserve;
use Illuminate\Http\Request;

class OptionReserveController extends Controller
{
    public function index()
    {
        return view('Admin.OptionReserve.index');
    }

    public function create()
    {
        return view('Admin.OptionReserve.create');
    }

    public function edit(OptionReserve $optionReserve)
    {
        return view('Admin.OptionReserve.edit' , compact('optionReserve'));
    }
}
