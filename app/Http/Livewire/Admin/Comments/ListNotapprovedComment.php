<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class ListNotapprovedComment extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    public $search = '';

    protected $comments = [];

    public function Approved(Comment $comment)
    {
        $comment->update(['status' => 1]);
    }

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
        })->where('status' , 0)->latest()->paginate($this->pagination);
    }

    private function selectCommentsNotApproved(): void
    {
        $this->comments = $this->search != '' ?  $this->Searching() : Comment::where('status', 0)
                ->latest()
                ->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
    }

    public function render()
    {
        $this->selectCommentsNotApproved();
        return view('livewire.admin.comments.list-notapproved-comment' , ['comments' => $this->comments]);
    }
}
