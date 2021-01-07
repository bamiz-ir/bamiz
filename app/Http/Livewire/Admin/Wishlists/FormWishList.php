<?php

namespace App\Http\Livewire\Admin\Wishlists;

use App\Models\Center;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
use App\Models\WishList;
use Livewire\Component;

class FormWishList extends Component
{
    public $titlePage = '';
    public $type = '';

    public $wishlist;
    public $wishlist_id;

    public $user_id;
    public $wish_listable_id;
    public $wish_listable_type;

    public $types = [];

    private function validation()
    {
        return $this->validate([
            'user_id' => 'required|numeric|exists:users,id',
            'wish_listable_id.*' => 'required|numeric',
            'wish_listable_type' => 'required',
        ]);
    }

    private function getWishListAble_ID()
    {
        return WishList::query()->where('user_id', $this->user_id)
            ->where('wish_listable_type', $this->wish_listable_type)->pluck('wish_listable_id');
    }

    private function getTypes_And_Wishlist_ID()
    {
        switch ($this->wish_listable_type) {
            case 'App\Models\Center':
                $this->types = Center::query()->where('is_remove', 0)->get();
                break;
            case 'App\Models\Product':
                $this->types = Product::query()->where('is_remove', 0)->get();
                break;
            case 'App\Models\Option':
                $this->types = Option::query()->where('is_remove', 0)->get();
                break;
        }
        if (isset($this->user_id) && $this->type == 'edit') {
            $this->wish_listable_id = $this->getWishListAble_ID();
        }
    }

    private function getDataForEdit()
    {
        $this->wishlist_id = $this->wishlist->id;
        $this->wish_listable_type = $this->wishlist->wish_listable_type;
        $this->user_id = $this->wishlist->user_id;

        $this->getTypes_And_Wishlist_ID();
    }

    private function CreateNewWishList($user)
    {
        foreach ($this->wish_listable_id as $wi) {
            $user->wish_lists()->create([
                'wish_listable_id' => $wi,
                'wish_listable_type' => $this->wish_listable_type
            ]);
        }
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'wish_listable_type' && isset($this->wish_listable_type)) {
            $this->getTypes_And_Wishlist_ID();
        }
    }

    public function store()
    {
        $this->validation();
        $user = User::query()->find($this->user_id);

        $this->CreateNewWishList($user);

        \Request::session()->flash('message', "موارد جدید به علاقه مندی های کاربر ({$user->username}) افزوده شد");
        return redirect(route('wish-lists.index'));
    }

    public function edit()
    {
        $this->validation();
        $user = User::query()->find($this->user_id);

        WishList::query()->where(function ($q){
            return $q->where('wish_listable_type', $this->wish_listable_type)
                ->where('user_id', $this->user_id);
        })->delete();

        $this->CreateNewWishList($user);

        \Request::session()->flash('message', "موارد جدید به علاقه مندی های کاربر ({$user->username}) افزوده شد");
        return redirect(route('wish-lists.index'));
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        $users = User::query()->where('block_status', 0)->get();
        return view('livewire.admin.wishlists.form-wish-list', ['users' => $users]);
    }
}
