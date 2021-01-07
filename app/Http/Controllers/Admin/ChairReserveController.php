<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChairReserve;
use Illuminate\Http\Request;

class ChairReserveController extends Controller
{
    public function index()
    {
         return view('Admin.ChairReserves.index');
    }
}
