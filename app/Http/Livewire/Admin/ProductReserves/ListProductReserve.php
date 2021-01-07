<?php

namespace App\Http\Livewire\Admin\ProductReserves;

use App\Models\ProductReserve;
use Livewire\Component;
use Livewire\WithPagination;

class ListProductReserve extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $search = '';
    public $pagination = 5;

    protected $product_reserves = [];

    private function Searching()
    {
        return ProductReserve::whereHas('reserve' , function ($query){
            return $query->whereHas('center' , function ($query){
                return $query->where('name' , 'like' , '%'  . $this->search . '%')
                    ->OrWhereHas('user' , function ($query){
                        return $query->where('username' , 'like' , '%' . $this->search . '%');
                    });
            });
        })->orWhereHas('product' , function ($query){
            return $query->where('title' , 'like' , '%' . $this->search . '%');
        })->latest()->paginate($this->pagination);
    }

    public function destroy(ProductReserve $productReserve)
    {
        $productReserve->delete();
    }

    private function selectProductReserves(): void
    {
        $this->product_reserves = $this->search != '' ? $this->Searching()
                : ProductReserve::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectProductReserves();
        return view('livewire.admin.product-reserves.list-product-reserve' , ['product_reserves' => $this->product_reserves]);
    }
}
