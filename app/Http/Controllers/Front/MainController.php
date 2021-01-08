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

    public function mizbans($slug)
    {
        return view('Front.mizbans' , compact('slug'));
    }

    public function center_detail()
    {
        return view('Front.center_detail');
    }

    public function centers()
    {
        return view('Front.centers');
    }

    public function galleries()
    {
        return view('Front.galleries');
    }

    public function about_us()
    {
        return view('Front.about_us');
    }

    public function contact_us()
    {
        return view('Front.contact_us');
    }
}
