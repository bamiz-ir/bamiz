<?php

namespace App\Http\Livewire\Front;

use App\Models\Article;
use App\Models\Center;
use Livewire\Component;
use Livewire\WithPagination;
use function PHPUnit\Framework\at;

class Blogs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $pagination = 5;
    public $search = '';

    protected $articles;
    public $best_centers;

    public function Searching()
    {
        return Article::where(function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')
                ->OrWhere('short_text', 'like', '%' . $this->search . '%')
                ->OrWhere('body', 'like', '%' . $this->search . '%')
                ->OrWhereHas('user', function ($query) {
                    return $query->where('username', 'like', '%' . $this->search . '%');
                })
                ->OrWhereHas('center', function ($query) {
                    return $query->where('name', 'like', '%' . $this->search . '%');
                });
        });
    }

    private function getData()
    {
        $this->best_centers = Center::where('is_remove', 0)->take(10)->orderByDesc('viewCount')->get();
    }

    public function render()
    {
        $this->articles = $this->search != '' ? $this->Searching() : Article::where('status', 1);

        $this->getData();
        return view('livewire.front.blogs', ['articles' => $this->articles]);
    }
}
