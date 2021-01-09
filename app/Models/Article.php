<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ["title" ,"slug" ,"short_text" ,"body" ,"tags"
        ,"keywords" ,"status" ,"LikeCount" ,"ViewCount" ,"CommentCount" ,"images" ,"user_id" , "center_id"];

    protected $casts = [
        'images' => 'array'
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment' , 'commentable');
    }
}
