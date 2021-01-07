<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [ "title", "body", "score", "LikeCount", "center_id", "user_id" , "status" , "commentable_type" , "commentable_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Polymorphic
    public function commentable()
    {
        return $this->morphTo();
    }

    public function center()
    {
        return $this->belongsTo(Center::class, 'commentable_id')
            ->where('commentable_type' , Center::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'commentable_id')
            ->where('commentable_type' , Article::class);
    }
    //////////////////
}
