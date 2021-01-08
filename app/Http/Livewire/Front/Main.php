<?php

namespace App\Http\Livewire\Front;

use App\Http\Controllers\traits\PageStaticValues;
use App\Models\Article;
use App\Models\Category;
use App\Models\Center;
use App\Models\Gallery;
use App\Models\Reserve;
use App\Models\Setting;
use Livewire\Component;

class Main extends Component
{
    use PageStaticValues;

    public $categories = [];
    public $centers = [];
    public $latest_galleries = [];
    public $latest_articles = [];

    private function GetTopFiveCenters()
    {
        try {
            $user_reserve = Reserve::query()->where('user_id' , auth()->user()->id)->get()->sortBy(function ($q){
                return $q->center->count();
            });

            $this->centers = Center::query()->where('is_remove', 0)
                ->whereHas('work_time' , function ($q){
                    return $q->where('center_id' , '!=' , null);
                })
                ->where('state_id' , $user_reserve->first()->center->state_id)->with('reserves')
                ->get()->sortByDesc(function ($center) {
                    return $center->reserves->count();
                })->take(10);
        }
        catch (\Exception $exception)
        {
//            $this->centers = Center::query()->where('is_remove', 0)->with('reserves')
//                ->whereHas('work_time' , function ($q){
//                    return $q->where('center_id' , '!=' , null);
//                })
//                ->get()->sortByDesc(function ($center) {
//                    return $center->reserves->count();
//                })->take(10);

            $this->centers = Center::query()->where('is_remove' , 0)
                ->whereHas('work_time' , function ($q){
                    return $q->where('center_id' , '!=' , null);
                })->limit(5)->get();
        }
    }

    private function selectData()
    {
        $this->categories = Category::query()->where('chid', 0)->where('is_remove', 0)->get();
        $this->latest_galleries = Gallery::query()->where('type' , 'image')->latest()->take(20)->get();
        $this->latest_articles = Article::query()->where('status' , 1)->latest()->take(4)->get();

        // Get Top Five Centers of Bamiz
        $this->GetTopFiveCenters();

        $this->HeaderAndFooterStaticData();
    }

    public function render()
    {
        $this->selectData();
        return view('livewire.front.main');
    }
}
