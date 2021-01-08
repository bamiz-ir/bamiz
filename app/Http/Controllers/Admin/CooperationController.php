<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\UploadImage;
use App\Models\Cooperation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CooperationController extends Controller
{
    private function uploadImage($file , $folder , $person_name)
    {
        $year = Carbon::now()->year;
        $mouth = Carbon::now()->month;
        $day = Carbon::now()->day;

        $imagePath = "/uploads/images/{$folder}/{$person_name}/{$year}-{$mouth}-{$day}/";
        $filename = time() . '-' . Str::random(20) . '-' . $file->getClientOriginalName();

        $file->move(public_path($imagePath) ,$filename);
        $url = $imagePath . $filename;

        return $url;
    }

    //////////////////////////////////////////////////////////////////////////

    public function index()
    {
        return view('Admin.Cooperation.index');
    }

    public function create()
    {
        return view('Admin.Cooperation.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file')
           ? $this->uploadImage($request->file('file') , 'cooperation' , $request->name . '-' . $request->family) : null;

        Cooperation::create([
            'name' => $request->name,
            'family' => $request->family,
            'address' => $request->address,
            'description' => $request->description,
            'phone' => $request->phone,
            'file' => $file
        ]);

        $full_name = $request->name . ' ' . $request->family;
        \Request::session()->flash('message', "درخواست همکاری شخص ({$full_name}) با موفقیت ثبت شد. ");
        return redirect(route('cooperations.index'));
    }

    public function edit(Cooperation $cooperation)
    {
        return view('Admin.Cooperation.edit' , compact('cooperation'));
    }

    public function update(Request $request, Cooperation $cooperation)
    {
        $file = $request->file('file')
           ? $this->uploadImage($request->file('file') , 'cooperation' , $request->name . '-' . $request->family) : null;

        $cooperation->update([
            'name' => $request->name,
            'family' => $request->family,
            'address' => $request->address,
            'description' => $request->description,
            'phone' => $request->phone,
            'file' => $file
        ]);

        $full_name = $request->name . ' ' . $request->family;
        \Request::session()->flash('message', "درخواست همکاری شخص ({$full_name}) با موفقیت ویرایش شد. ");

        return redirect(route('cooperations.index'));
    }
}
