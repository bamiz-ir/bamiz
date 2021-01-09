<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ListArticle extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $search = '';
    public $pagination = 5;

    protected $articles = [];


    public function Searching()
    {
        return Article::where(function ($query){

            return $query->where('title' , 'like' ,  '%' . $this->search  . '%')
                ->orWhere('slug' , 'like' ,  '%' . $this->search  . '%')
                ->orWhere('short_text' , 'like' ,  '%' . $this->search  . '%')
                ->orWhere('body' , 'like' ,  '%' . $this->search  . '%');

        })->latest()->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(Article $article)
    {
        $article->delete();
    }

    public function render()
    {
        $this->selectArticles();

        return view('livewire.admin.articles.list-article' , ['articles' => $this->articles]);
    }

    private function selectArticles(): void
    {
        $this->articles = $this->search != ''
            ? $this->Searching()
            : Article::latest()
                ->paginate($this->pagination);
    }
}
