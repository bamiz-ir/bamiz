<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class ListComment extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $search = '';
    public $pagination = 5;

    protected $comments = [];

    private function Searching()
    {
        return Comment::where(function ($query){
            $query->where('title' , 'like' , '%' . $this->search . '%')
                ->orWhere('body' , 'like' , '%' . $this->search . '%')
                ->orWhereHas('center' , function ($query){
                    return $query->where('name' , 'like' , '%' . $this->search . '%')->where('is_remove' , 0);
                })
                ->OrWhereHas('article' , function ($query){
                    return $query->where('title' , 'like' , '%' . $this->search . '%');
                })
                ->orWhereHas('user' , function ($query){
                    return $query->where('username' , 'like' , '%' . $this->search . '%')->where('block_status' , 0);
                });
        })->where('status' , 1)->latest()->paginate($this->pagination);
    }

    public function NotApproved(Comment $comment)
    {
        $comment->update(['status' => 0]);
    }

    private function selectComments(): void
    {
        $this->comments = $this->search != '' ? $this->Searching() :
            Comment::where('status', 1)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectComments();
        return view('livewire.admin.comments.list-comment' , ['comments' => $this->comments]);
    }
}
