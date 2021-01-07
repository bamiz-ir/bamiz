<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class TrashCategoryController extends Controller
{
    public function index()
    {
        return view('Admin.TrashCategories.index');
    }
}
