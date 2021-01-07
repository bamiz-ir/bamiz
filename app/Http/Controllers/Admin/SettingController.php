<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('Admin.Settings.index');
    }

    public function create()
    {
        return view('Admin.Settings.create');
    }

    public function edit(Setting $setting)
    {
        return view('Admin.Settings.edit' , compact('setting'));
    }

}
