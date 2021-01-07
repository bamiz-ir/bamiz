<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockUserController extends Controller
{
    public function index()
    {
        return view('Admin.BlockUsers.index');
    }
}
