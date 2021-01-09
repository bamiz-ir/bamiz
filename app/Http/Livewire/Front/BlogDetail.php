<?php

namespace App\Http\Livewire\Front;

use App\Http\Controllers\traits\CommentTrait;
use App\Models\Article;
use App\Models\Center;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class BlogDetail extends Component
{
    use CommentTrait;

    public $search = '';

    public $blog;
    public $articles;
    public $best_centers;
    public $comments;

    public $title;
    public $body;
    public $star = 0;

    private function ValidateCommentData()
    {
        $this->validate([
            'title' => 'required|string|max:50',
            'body' => 'required|string|max:300',
            'star' => 'numeric|max:5',
        ]);
    }

    public function SubmitNewComment()
    {
        $this->ValidateCommentData();
        self::CheckBadWords($this->title , $this->body);

        $this->star = $this->star != null ? $this->star : null;

        Comment::create([
            'user_id' => auth()->user()->id,
            'commentable_id' => $this->blog->id,
            'commentable_type' => get_class($this->blog),
            'body' => $this->body,
            'title' => $this->title,
            'score' => $this->star
        ]);

        $this->blog->update(['CommentCount' , $this->blog->CommentCount += 1]);

        $this->title = $this->body = null;
        $this->star = 0;

        session()->flash('comment_add' , 'نظر شما کاربر عزیز با موفقیت ثبت شد و پس تایید مدیر در سایت قرار میگیرد.');
    }

    private function getData()
    {
        $this->articles = Article::orderByDesc('LikeCount')->get();
        $this->best_centers = Center::orderByDesc('ViewCount')->take(10)->get();
        $this->comments = Comment::query()->where(function ($query){
            return $query->where('status' , 1)
                ->where('commentable_id' , $this->blog->id)
                ->where('commentable_type' , get_class($this->blog));
        })->get();
    }

    public function mount()
    {
        $this->blog = Article::where('slug' , request('slug'))->firstOrFail();
        $this->blog->update(['ViewCount' , $this->blog->ViewCount += 1]);
    }

    public function render()
    {
        $this->getData();
        return view('livewire.front.blog-detail');
    }
}
