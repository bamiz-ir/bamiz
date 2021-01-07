<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class FailedPaymentController extends Controller
{
    public function index()
    {
        return view('Admin.Faild_Payments.index');
    }
}
