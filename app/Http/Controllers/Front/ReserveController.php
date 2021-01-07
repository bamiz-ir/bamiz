<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function reserve(Request $request)
    {
        $data = array_merge($request->all() , ['slug' => \request('slug')]);
        session()->flush();
        session()->push('data' , $data);
        return redirect(route('Show_Reserve' , \request('slug')));
    }

    public function ShowReservePage()
    {
        $data = session()->get('data');
        if (!$data)
        {
            return redirect('/');
        }
        return view('Front.reserve' , compact('data'));
    }
}
