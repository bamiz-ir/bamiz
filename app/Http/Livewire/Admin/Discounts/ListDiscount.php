<?php

namespace App\Http\Livewire\Admin\Discounts;

use App\Models\Discount;
use Livewire\Component;
use Livewire\WithPagination;

class ListDiscount extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $discounts = [];

    public function destroy(Discount $discount)
    {
        $discount->delete();
    }

    private function Searching()
    {
        return Discount::where(function ($query){
            return $query->where('percent' , 'like' , '%' . $this->search . '%')
                ->OrWhere('use_count' , 'like' , '%' . $this->search . '%')
                ->OrWhereHas('product' , function ($query){
                    return $query->where('title' , 'like' , '%' . $this->search . '%');
                });
        })->latest()->paginate($this->pagination);
    }

    private function selectDiscounts(): void
    {
        $this->discounts = $this->search != ''  ?  $this->Searching()  :  Discount::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectDiscounts();
        return view('livewire.admin.discounts.list-discount' , ['discounts' => $this->discounts]);
    }
}
