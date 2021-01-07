<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    private function validationSlug($result, Category $category): void
    {
        if ($result != null && $result->slug != $category->slug) {
            throw ValidationException::withMessages(['slug' => 'نامک قبلا انتخاب شده است.']);
        }
    }

    public function index()
    {
        return view('Admin.Categories.index');
    }

    public function create()
    {
        return view('Admin.Categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $images = $this->uploadImages($request->file('images') , 'categories');
        Category::create(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "دسته بندی  ($request->title)  با موفقیت افزوده شد.");
        return redirect(route('categories.index'));
    }

    public function edit(Category $category)
    {
        return view('Admin.Categories.edit' , compact('category'));
    }

    public function update(CategoryRequest $request , Category $category)
    {
        $images = $request->file('images') ?  $this->uploadImages($request->file('images') , 'categories')
            :   $category->images;

        $result = Category::query()->where('slug', '=', $request->slug)->first();
        $this->validationSlug($result, $category);

        $category->update(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "دسته بندی  ($request->title)  با موفقیت ویرایش شد.");
        return redirect(route('categories.index'));
    }
}
