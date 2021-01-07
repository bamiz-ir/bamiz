<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use App\Models\Center;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class FormArticle extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $titlePage = '';
    public $type = '';

    public $article;
    public $article_id;
    public $title;
    public $slug;
    public $keywords;
    public $tags;
    public $short_text;
    public $body;
    public $status;
    public $images;

    private function getDataForEdit()
    {
        $this->article_id = $this->article->id;
        $this->title = $this->article->title;
        $this->slug = $this->article->slug;
        $this->keywords = $this->article->keywords;
        $this->tags = $this->article->tags;
        $this->short_text = $this->article->short_text;
        $this->body = $this->article->body;
        $this->status = $this->article->status;
        $this->images = $this->article->images;
    }

    public function mount()
    {
        $this->type == 'edit' && $this->getDataForEdit();
    }

    public function render()
    {
        $centers = Center::getCenters();
        return view('livewire.admin.articles.form-article' , ['centers' => $centers]);
    }
}
