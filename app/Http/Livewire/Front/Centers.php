<?php

namespace App\Http\Livewire\Front;

use App\Models\Center;
use Livewire\Component;
use Livewire\WithPagination;

class Centers extends Component
{
    use WithPagination;

    protected $centers;

    public $pagination = 9;
    protected $paginationTheme = 'bootstrap';

    public $search_category;
    public $search_word;
    public $search_city_or_state;

    public function SearchAndFilter()
    {
       $this->centers = Center::where('is_remove' , 0);

       if ($this->search_word)
       {
           $this->centers = $this->centers->where(function ($query){
               return $query->where('name' , 'like' , '%' . $this->search_word . '%');
           });
       }

        if ($this->search_city_or_state)
        {
            $this->centers->where(function ($query){
                $query->whereHas('city' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search_city_or_state . '%');
                }) ->OrWhereHas('state' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search_city_or_state . '%');
                });
            });
        }

        if ($this->search_category != 0)
        {
           $this->centers = $this->centers->where(function ($query){
                return $query->where('category_id' , $this->search_category);
            });
        }

        $this->centers = $this->centers->latest()->paginate($this->pagination);
        dd($this->centers);
    }

    private function getCenterBySlug($slug)
    {
        return Center::where('slug' , $slug)->first();
    }

    public function AddToWishList($slug)
    {
        $center = $this->getCenterBySlug($slug);
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
        $center = $this->getCenterBySlug($slug);
        if ($center)
        {
            auth()->user()->wish_lists()
                ->where('wish_listable_id', $center->id)->where('wish_listable_type', get_class($center))->delete();
        }
    }

    private function getData()
    {
        $this->centers = Center::where('is_remove' , 0)
            ->whereHas('work_time' , function ($query){
                return $query->where('center_id' , '!=' , null);
            })->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->getData();
        return view('livewire.front.centers' , ['centers' => $this->centers]);
    }
}
