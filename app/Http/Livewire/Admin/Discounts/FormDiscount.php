<?php

namespace App\Http\Livewire\Admin\Discounts;

use App\Models\Center;
use App\Models\Discount;
use App\Models\Product;
use Livewire\Component;

class FormDiscount extends Component
{
    public $titlePage = '';
    public $type = '';

    public $discount;
    public $products = [];
    public $center_id;

    public $discount_id;
    public $percent;
    public $use_count;
    public $expiration;
    public $product_id;

    private function validation()
    {
        return $this->validate([
            'percent' => 'required|numeric',
            'expiration' => 'required|date|after:now',
            'product_id' => 'required|numeric|exists:products,id',
            'use_count' => 'required|numeric',
        ]);
    }

    private function SetProducts()
    {
        $this->products = Product::query()
            ->where('center_id' , $this->center_id)
            ->where('is_remove' , 0)->get();
    }

    private function getDataForEdit()
    {
        $this->discount_id = $this->discount->id;
        $this->percent = $this->discount->percent;
        $this->use_count = $this->discount->use_count;
        $this->expiration = $this->discount->expiration;
        $this->product_id = $this->discount->product_id;
        $this->center_id = $this->discount->product->center->id;

        $this->SetProducts();
    }

    public function store()
    {
        $data = $this->validation();
        $discount = Discount::create($data);

        \Request::session()->flash('message', "تخفیف {$discount->percent} درصدی برای غذای ({$discount->product->title}) با موفقیت ثبت شد. ");
        return redirect(route('discounts.index'));
    }

    public function edit(Discount $discount)
    {
        $data = $this->validation();

        $discount->update($data);

        \Request::session()->flash('message', "تخفیف {$discount->percent} درصدی برای غذای ({$discount->product->title}) با موفقیت ویرایش ثبت شد. ");
        return redirect(route('discounts.index'));
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function updated($propertyName)
    {
        $propertyName == 'center_id'  &&  $this->SetProducts();
    }

    public function render()
    {
        $centers = Center::getCenters();
        return view('livewire.admin.discounts.form-discount' , ['centers' => $centers]);
    }
}
