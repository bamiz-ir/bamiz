<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CacheController extends Controller
{
    public function delete()
    {
        return view('Admin.Caches.delete');
    }
}
