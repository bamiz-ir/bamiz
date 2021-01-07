<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Http\Controllers\traits\CommentTrait;
use App\Models\Article;
use App\Models\Center;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class FormComment extends Component
{
    use CommentTrait;

    public $titlePage = '';
    public $type = '';

    public $Names = [];

    public $title;
    public $comment;
    public $comment_id;
    public $body;
    public $status;
    public $commentable_type;
    public $commentable_id;

    private function validation()
    {
        return $this->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:500',
            'status' => 'required',
            'commentable_type' => 'required|max:18',
            'commentable_id' => 'required|numeric',
        ]);
    }

    private function GetNamesForCommentable_type()
    {
        $this->Names = $this->commentable_type == 'App\Models\Article'  ?  Article::query()->where('status', 1)->get()
                 :  Center::query()->where('is_remove' , 0)->get();
    }

    private function getDataForEdit()
    {
        $this->comment_id = $this->comment->id;
        $this->body = $this->comment->body;
        $this->title = $this->comment->title;
        $this->status = $this->comment->status;
        $this->commentable_type = $this->comment->commentable_type;
        $this->commentable_id = $this->comment->commentable_id;

        $this->GetNamesForCommentable_type();
    }

    public function edit(Comment $comment)
    {
        $this->validation();
        self::CheckBadWords($this->title , $this->body);

        $comment->update([
            'title' => $this->title,
            'body' => $this->body,
            'status' => $this->status,
            'commentable_type' => $this->commentable_type,
            'commentable_id' => $this->commentable_id
        ]);

        \Request::session()->flash('message', "نظز ($comment->title) با موفقیت ویرایش شد. ");
        return redirect(route('comments.index'));
    }

    public function updated($propertyName)
    {
        ($propertyName == 'commentable_type' && (in_array($this->commentable_type , ['App\Models\Article' , 'App\Models\Center'])))
              &&  $this->GetNamesForCommentable_type();
    }

    public function mount()
    {
        $this->getDataForEdit();
    }

    public function render()
    {
        return view('livewire.admin.comments.form-comment' , ['centers' => $this->Names]);
    }
}
