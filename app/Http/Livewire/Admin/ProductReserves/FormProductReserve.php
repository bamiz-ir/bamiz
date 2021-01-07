<?php

namespace App\Http\Livewire\Admin\ProductReserves;

use App\Models\Center;
use App\Models\Product;
use App\Models\ProductReserve;
use App\Models\Reserve;
use Livewire\Component;

class FormProductReserve extends Component
{
    public $titlePage = '';
    public $type = '';

    public $product_reserve;

    public $product_reserve_id;
    public $reserve_id , $product_id;
    public $center_id;

    public $products = [];
    public $centers = [];

    private function validation()
    {
        return $this->validate([
            "reserve_id" =>  'required|numeric|exists:reserves,id',
            "center_id" =>  'required|numeric|exists:centers,id',
            "product_id.*" =>  'required|numeric|exists:products,id',
        ]);
    }

    private function getDataForEdit()
    {
        $this->product_reserve_id = $this->product_reserve->id;
        $this->product_id = $this->product_reserve->product_id;
        $this->reserve_id = $this->product_reserve->reserve_id;
        $this->center_id = $this->product_reserve->reserve->center->id;

        $this->products = Product::query()->where('is_remove' , 0)->get();
        $this->centers = Center::query()->where('is_remove' , 0)->get();
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'reserve_id')
        {
            $this->centers = Center::query()->whereHas('reserves' , function ($query){
                return $query->where('id' , $this->reserve_id);
            })->get();
        }

        $propertyName == 'center_id' &&  $this->products = Product::query()->where('center_id' , $this->center_id)->get();
    }

    public function store()
    {
        $this->validation();

        $reserve = Reserve::query()->find($this->reserve_id);
        $reserve->products()->sync($this->product_id);

        \Request::session()->flash('message', "رزرو غذای  مورد نظر با موفقیت ثبت شد. ");
        return redirect(route('product_reserves.index'));
    }

    public function edit(ProductReserve $productReserve)
    {
        $this->validation();

        $reserve = Reserve::query()->find($this->reserve_id);
        $reserve->products()->sync($this->product_id);

        \Request::session()->flash('message', "رزرو غذای  مورد نظر با موفقیت ویرایش شد. ");
        return redirect(route('product_reserves.index'));
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    private function selectReserves()
    {
        return Reserve::query()->whereHas('center', function ($query) {
                return $query->where('is_remove', 0);
            })->get();
    }

    public function render()
    {
        $reserves = $this->selectReserves();

        return view('livewire.admin.product-reserves.form-product-reserve' ,
            ['reserves' => $reserves , 'products' => $this->products , 'centers' => $this->centers]);
    }
}
