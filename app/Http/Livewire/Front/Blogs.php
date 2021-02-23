<?php

namespace App\Http\Livewire\Front;

use App\Http\Controllers\traits\BlogTrait;
use App\Models\Article;
use App\Models\Center;
use Livewire\Component;
use Livewire\WithPagination;
use function PHPUnit\Framework\at;

class Blogs extends Component
{
    use BlogTrait;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pagination = 5;
    public $search = '';

    protected $articles;
    public $best_centers;

    public function Searching()
    {
        $this->articles =  Article::where(function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')
                ->OrWhere('short_text', 'like', '%' . $this->search . '%')
                ->OrWhere('body', 'like', '%' . $this->search . '%')
                ->OrWhereHas('user', function ($query) {
                    return $query->where('username', 'like', '%' . $this->search . '%');
                })
                ->OrWhereHas('center', function ($query) {
                    return $query->where('name', 'like', '%' . $this->search . '%');
                });
        })->where('status' , 1);
    }

    private function getData()
    {
        if ($this->search == '')
        {
            $this->articles = Article::where('status', 1);
        }
        $this->best_centers = self::BestCenterBlogs();
    }

    public function render()
    {
        $this->getData();
        return view('livewire.front.blogs', ['articles' => $this->articles]);
    }
}
