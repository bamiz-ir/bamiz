<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OptionController extends Controller
{
    private static function ValidateSlug($request , $option)
    {
        $result = Option::query()->where('slug' , $request->slug)->first();
        if ($result && $result->slug != $option->slug)
        {
            throw ValidationException::withMessages(['slug' => 'نامک قبلا انتخاب شده است.']);
        }
    }
    //////////////////////////////////////////////
    public function index()
    {
        return view('Admin.Options.index');
    }

    public function create()
    {
        return view('Admin.Options.create');
    }

    public function store(OptionRequest $request)
    {
        $images = $this->uploadImages($request->file('images') , 'options');
        Option::create(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "تشریفات ($request->title) با موفقیت ثبت شد. ");
        return redirect(route('options.index'));
    }

    public function edit(Option $option)
    {
        return view('Admin.Options.edit' , compact('option'));
    }

    public function update(OptionRequest $request, Option $option)
    {
        self::ValidateSlug($request , $option);

        $images = $request->file('images')  ?   $this->uploadImages($request->file('images') , 'options')
                :  $option->images;

        $option->update(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "تشریفات ($request->title) با موفقیت ویرایش شد. ");
        return redirect(route('options.index'));
    }

}
