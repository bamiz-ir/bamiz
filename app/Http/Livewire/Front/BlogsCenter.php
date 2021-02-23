<?php

namespace App\Http\Livewire\Front;

use App\Http\Controllers\traits\BlogTrait;
use App\Models\Article;
use App\Models\Center;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsCenter extends Component
{
    use BlogTrait;
    use WithPagination;

    public $search;
    public $pagination = 5;

    protected $articles;
    public $center_id;
    public $best_centers;

    public function Searching()
    {
        $this->articles = Article::where(function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')
                ->OrWhere('short_text', 'like', '%' . $this->search . '%')
                ->OrWhere('body', 'like', '%' . $this->search . '%')
                ->OrWhereHas('user', function ($query) {
                    return $query->where('username', 'like', '%' . $this->search . '%');
                })
                ->OrWhereHas('center', function ($query) {
                    return $query->where('name', 'like', '%' . $this->search . '%');
                });
        })->Where(function ($query){
            return $query->where('status' , 1)
                ->Where('center_id' , $this->center_id);
        });
    }

    private function getData()
    {
        if ($this->search == '')
        {
            $this->articles = Article::where('status' , 1)->where('center_id' , $this->center_id);
        }
        $this->best_centers = self::BestCenterBlogs();
    }

    public function mount()
    {
        $center = Center::where('slug' , request('slug'))->firstOrFail();
        $this->center_id = $center->id;
    }

    public function render()
    {
        $this->getData();
        return view('livewire.front.blogs-center' , ['articles' => $this->articles]);
    }
}
