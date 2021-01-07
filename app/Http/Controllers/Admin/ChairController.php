<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chair;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    public function index()
    {
        return view('Admin.Chairs.index');
    }

    public function create()
    {
        return view('Admin.Chairs.create');
    }

    public function edit(Chair $chair)
    {
        return view('Admin.Chairs.edit' , compact('chair'));
    }
}
