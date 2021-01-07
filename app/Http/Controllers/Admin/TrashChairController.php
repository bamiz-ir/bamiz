<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chair;
use Illuminate\Http\Request;

class TrashChairController extends Controller
{
    public function index()
    {
        return view('Admin.TrashChairs.index');
    }
}
