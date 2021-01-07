<?php

namespace App\Http\Livewire\Admin\TrashProducts;

use App\Models\Product;
use Livewire\Component;

class ListTrashProduct extends Component
{
    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $products = [];

    private function Searching()
    {
        return Product::where(function ($query){
            return $query->where('title' , 'like' , '%' . $this->search . '%')
                ->orWhere('slug' , 'like' , '%' . $this->search . '%')
                ->orWhere('description' , 'like' , '%' . $this->search . '%')
                ->orWhereHas('center' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%')->where('is_remove' , 0);
                })->OrWhere('sale_count' , 'like' , '%' . $this->search . '%');
        })->where('is_remove' , 1)->latest()->paginate($this->pagination);
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }

    public function restore(Product $product)
    {
        $product->update(['is_remove' => 0]);
    }

    private function selectTrashProducts(): void
    {
        $this->products = $this->search != '' ? $this->Searching()
            : Product::where('is_remove', 1)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectTrashProducts();
        return view('livewire.admin.trash-products.list-trash-product' , ['products' => $this->products]);
    }
}
