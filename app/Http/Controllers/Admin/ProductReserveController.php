<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReserve;
use Illuminate\Http\Request;

class ProductReserveController extends Controller
{
    public function index()
    {
        return view('Admin.ProductReserves.index');
    }

    public function create()
    {
        return view('Admin.ProductReserves.create');
    }

    public function edit(ProductReserve $productReserve)
    {
        return view('Admin.ProductReserves.edit' , compact('productReserve'));
    }
}
