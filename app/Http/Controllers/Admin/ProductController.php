<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('Admin.Products.index');
    }

    public function create()
    {
        return view('Admin.Products.create');
    }

    public function store(ProductRequest $request)
    {
        $images = self::Uploading_Images_Multiple($request->file('images') , 'products');
        Product::create(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "غذای ($request->title) با موفقیت ثبت شد. ");
        return redirect(route('products.index'));
    }

    public function edit(Product $product)
    {
        return view('Admin.Products.edit' , compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $images = $request->file('images')  ?  self::Uploading_Images_Multiple($request->file('images') , 'products')
                :  $product->images;

        $product->update(array_merge($request->all() , ['images' => $images]));

        \Request::session()->flash('message', "غذای ($request->title) با موفقیت ویرایش شد. ");
        return redirect(route('products.index'));
    }
}
