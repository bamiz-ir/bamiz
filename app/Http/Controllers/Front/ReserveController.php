<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReserveRequest;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function reserve(ReserveRequest $request)
    {
        if (!auth()->check())
        {
            return redirect('/login');
        }

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
