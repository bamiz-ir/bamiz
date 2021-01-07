<?php

namespace App\Http\Livewire\Front;

use App\Models\Category;
use App\Models\Center;
use Livewire\Component;

class Mizbans extends Component
{
    public $centers;
    public $slug;

    public $is_Added_To_WishList = true;

    public function AddToWishList($slug)
    {
        $center = Center::query()->where('slug', $slug)->first();
        if ($center)
        {
            auth()->user()->wish_lists()->create([
                'wish_listable_id' => $center->id,
                'wish_listable_type' => get_class($center),
            ]);
        }
    }

    public function DeleteFromWishList($slug)
    {
        $center = Center::query()->where('slug', $slug)->first();

        if ($center)
        {
            auth()->user()->wish_lists()
                ->where('wish_listable_id', $center->id)->where('wish_listable_type', get_class($center))->delete();
        }
    }

    private function getData()
    {
        $this->centers = Category::query()->where('slug', $this->slug)->first()->centers;
    }

    public function render()
    {
        $this->getData();
        return view('livewire.front.mizbans', ['centers' => $this->centers]);
    }
}
