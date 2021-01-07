<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class TrashOptionController extends Controller
{
    public function index()
    {
        return view('Admin.TrashOptions.index');
    }
}
