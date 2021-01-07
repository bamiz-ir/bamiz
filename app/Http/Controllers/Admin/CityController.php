<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return view('Admin.Cities.index');
    }

    public function create()
    {
        return view('Admin.Cities.create');
    }

    public function edit(City $city)
    {
        return view('Admin.Cities.edit' , compact('city'));
    }

}
