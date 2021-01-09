<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CenterRequest;
use App\Models\Center;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CenterController extends Controller
{
    private static function ValidateSlug($request , $center)
    {
        $result = Center::query()->where('slug' , $request->slug)->first();
        if ($result && $result->slug != $center->slug)
        {
            throw ValidationException::withMessages(['slug' => 'نامک قبلا انتخاب شده است.']);
        }
    }
/////////////////////////////////////////////////////////////
    public function index()
    {
        return view('Admin.Centers.index');
    }

    public function create()
    {
        return view('Admin.Centers.create');
    }

    public function store(CenterRequest $request)
    {
        $images = $this->uploadImages($request->file('images') , 'centers');
        Center::create(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "مرکز ($request->name) با موفقیت افزوده شد. ");
        return redirect(route('centers.index'));
    }

    public function edit(Center $center)
    {
        return view('Admin.Centers.edit' , compact('center'));
    }

    public function update(CenterRequest $request, Center $center)
    {
        self::ValidateSlug($request , $center);

        $images = $request->file('images') ? $this->uploadImages($request->file('images') , 'centers')
             :  $center->images;

        $center->update(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "مرکز ($request->name) با موفقیت ویرایش شد. ");
        return redirect(route('centers.index'));
    }
}
