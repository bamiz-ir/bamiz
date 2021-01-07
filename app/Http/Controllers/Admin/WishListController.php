<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function index()
    {
        return view('Admin.WishLists.index');
    }

    public function create()
    {
        return view('Admin.WishLists.create');
    }

    public function edit(WishList $wishList)
    {
        return view('Admin.WishLists.edit' , compact('wishList'));
    }
}
