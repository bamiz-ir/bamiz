<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('Admin.Articles.index');
    }

    public function create()
    {
        return view('Admin.Articles.create');
    }

    public function store(ArticleRequest  $request)
    {
        $images = $this->uploadImages($request->file('images') , 'articles');

        auth()->user()->articles()->create(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "مقاله ($request->title) با موفقیت ثبت شد. ");
        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {
         return view('Admin.Articles.edit' , compact('article'));
    }

    public function update(Article $article , ArticleRequest $request)
    {
        $request->file('images') ? $images = $this->uploadImages($request->file('images') , 'articles') : $images = $article->images;

        $article->update(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "مقاله ($request->title) با موفقیت ویرایش شد. ");
        return redirect(route('articles.index'));
    }
}
