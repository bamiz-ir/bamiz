<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        return view('Admin.Discounts.index');
    }

    public function create()
    {
        return view('Admin.Discounts.create');
    }

    public function edit(Discount $discount)
    {
        return view('Admin.Discounts.edit' , compact('discount'));
    }
}
