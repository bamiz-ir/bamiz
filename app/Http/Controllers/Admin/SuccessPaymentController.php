<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class SuccessPaymentController extends Controller
{
    public function index()
    {
        return view('Admin.Success_Payments.index');
    }
}
