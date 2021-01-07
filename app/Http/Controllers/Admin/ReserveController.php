<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\ReserveTrait;
use App\Http\Requests\ReserveRequest;
use App\Models\Center;
use App\Models\Reserve;
use App\Models\Setting;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReserveController extends Controller
{
    use ReserveTrait;

    public function index()
    {
        return view('Admin.Reserves.index');
    }

    public function failed_reserves()
    {
        return view('Admin.Reserves.failed');
    }

    public function create()
    {
        return view('Admin.Reserves.create');
    }

    public function store(ReserveRequest $request)
    {
        $this->Check_Exist($request);

        $reserve = Reserve::create([
            "date" => $request->date,
            "time" => $request->time,
            "guest_count" => $request->guest_count,
            "price" => $request->price,
            "user_id" => $request->user_id,
            "center_id" => $request->center_id,
            "status" => true,
            "chair_id" => $request->chair_id == '0' ? null :  $request->chair_id
        ]);

        if ($request->option_id != '0') $reserve->options()->sync($request->option_id);
        if ($request->product_id != '0') $reserve->products()->sync($request->product_id);

        \Request::session()->flash('message', "رزرو ({$reserve->user->username} |  {$reserve->center->name}) با موفقیت ثبت شد. ");
        return redirect(route('reserves.index'));
    }

    public function edit(Reserve $reserve)
    {
        return view('Admin.Reserves.edit', compact("reserve"));
    }

    public function update(ReserveRequest $request, Reserve $reserve)
    {
        $this->Check_Exist($request, $reserve->id);

        $reserve->update([
            "date" => $request->date,
            "time" => $request->time,
            "guest_count" => $request->guest_count,
            "price" => $request->price,
            "user_id" => $request->user_id,
            "center_id" => $request->center_id,
            "status" => true,
            "chair_id" => $request->chair_id == '0' ? null :  $request->chair_id
        ]);

        if ($request->option_id) $reserve->options()->sync($request->option_id);
        if ($request->product_id) $reserve->products()->sync($request->product_id);

        \Request::session()->flash('message', "رزرو ({$reserve->user->username} |  {$reserve->center->name}) با موفقیت ویرایش شد. ");
        return redirect(route('reserves.index'));
    }
}
