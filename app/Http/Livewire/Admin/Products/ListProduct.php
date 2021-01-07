<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListProduct extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $products = [];

    public function destroy(Product $product)
    {
        $product->update(['is_remove' => true]);
    }

    private function Searching()
    {
        return Product::where(function ($query){
            return $query->where('title' , 'like' , '%' . $this->search . '%')
                ->orWhere('slug' , 'like' , '%' . $this->search . '%')
                ->orWhere('description' , 'like' , '%' . $this->search . '%')
                ->orWhereHas('center' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%')->where('is_remove' , 0);
                })->OrWhere('sale_count' , 'like' , '%' . $this->search . '%');
        })->where('is_remove' , 0)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->products = $this->search != ''  ?  $this->Searching()
            :  Product::where('is_remove' , 0)->latest()->paginate($this->pagination);

        return view('livewire.admin.products.list-product' , ['products' => $this->products]);
    }
}
