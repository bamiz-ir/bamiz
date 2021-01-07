<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Center;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function index()
    {
        return view('Admin.Galleries.index');
    }

    public function create()
    {
        return view('Admin.Galleries.create');
    }

    public function store(GalleryRequest $request)
    {
        $images = self::Uploading_Images_Multiple($request->file('captions') , Center::find($request->center_id)->name);

        auth()->user()->galleries()->create(array_merge($request->all() , ['captions' => $images]));

        \Request::session()->flash('message', "گالری مورد نظر با موفقیت ثبت شد. ");
        return redirect(route('galleries.index'));
    }

    public function edit(Gallery $gallery)
    {
        return view('Admin.Galleries.edit' , compact('gallery'));
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $images = $request->file('captions')  ?
            self::Uploading_Images_Multiple($request->file('captions') , Center::find($request->center_id)->name)
                    :  $gallery->captions;

        $gallery->update(array_merge($request->all() , ['captions' => $images]));

        \Request::session()->flash('message', "گالری مورد نظر با موفقیت ویرایش شد. ");
        return  redirect(route('galleries.index'));
    }
}
