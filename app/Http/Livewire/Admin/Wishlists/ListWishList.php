<?php

namespace App\Http\Livewire\Admin\Wishlists;

use App\Models\User;
use App\Models\WishList;
use Livewire\Component;
use Livewire\WithPagination;

class ListWishList extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $search = '';
    public $pagination = 5;

    protected $wish_lists = [];

    private function Searching()
    {
        return WishList::where(function ($query){
            return $query->whereHas('user' , function ($query){
                return $query->where('username' , 'like' , '%' . $this->search . '%');
            })
                ->OrwhereHas('center' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%');
                })
                ->OrwhereHas('product' , function ($query){
                    return $query->where('title' , 'like' , '%' . $this->search . '%');
                })
                ->OrwhereHas('option' , function ($query){
                    return $query->where('title' , 'like' , '%' . $this->search . '%');
                });
        })->latest()->paginate($this->pagination);
    }

    public function destroy(WishList $wishList)
    {
        $wishList->delete();
    }

    private function getData()
    {
        return WishList::latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->wish_lists = $this->search != '' ?  $this->Searching()  :  $this->getData();
        return view('livewire.admin.wishlists.list-wish-list' , ['wish_lists' => $this->wish_lists]);
    }
}
