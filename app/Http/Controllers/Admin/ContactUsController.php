<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('Admin.ContactUs.index');
    }

    public function create()
    {
        return view('Admin.ContactUs.create');
    }

    public function store(ContactUsRequest $request)
    {
        ContactUs::create($request->all());

        \Request::session()->flash('message', "تماس با ما ($request->title) با موفقیت ثبت شد. ");
        return redirect(route('contact_us.index'));
    }

    public function edit(ContactUs $contactUs)
    {
        return view('Admin.ContactUs.edit' , compact('contactUs'));
    }

    public function update(ContactUsRequest $request, ContactUs $contactUs)
    {
        $contactUs->update($request->all());

        \Request::session()->flash('message', "تماس با ما ($request->title) با موفقیت ویرایش شد. ");
        return redirect(route('contact_us.index'));
    }
}
