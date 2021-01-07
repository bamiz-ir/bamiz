<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorktimeRequest;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WorktimeController extends Controller
{
    private static function CheckExists($request , $work_time = null)
    {
        $result = WorkTime::query()->where('center_id' , $request->center_id)->first();
        if ($result && $result != $work_time)
        {
            throw ValidationException::withMessages(['center_id' => 'زمان کاری برای این مرکز قبلا یکبار ثبت شده است!']);
        }
    }

    ////////////////////////////////////////////////

    public function index()
    {
        return view('Admin.WorkTimes.index');
    }

    public function create()
    {
        return view('Admin.WorkTimes.create');
    }

    public function store(WorktimeRequest $request)
    {
        self::CheckExists($request);
        WorkTime::create([
            "week_days"  => join(' , ' , $request->week_days),
            "fromHour" => $request->fromHour ,
            "toHour" => $request->toHour ,
            "center_id" => $request->center_id
        ]);

        \Request::session()->flash('message', "زمان کاری مورد نظر با موفقیت ثبت شد. ");
        return redirect(route('work-times.index'));
    }

    public function edit(WorkTime $workTime)
    {
        return view('Admin.WorkTimes.edit' , compact('workTime'));
    }

    public function update(WorktimeRequest $request , WorkTime $workTime)
    {
        self::CheckExists($request , $workTime);
        $workTime->update([
            "week_days"  => join(' , ' , $request->week_days),
            "fromHour" => $request->fromHour ,
            "toHour" => $request->toHour ,
            "center_id" => $request->center_id
        ]);

        \Request::session()->flash('message', "زمان کاری مورد نظر با موفقیت ویرایش شد. ");
        return redirect(route('work-times.index'));
    }

}
