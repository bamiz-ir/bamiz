<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('Front.main');
    }

    public function center_detail()
    {
        return view('Front.center_detail');
    }
}
