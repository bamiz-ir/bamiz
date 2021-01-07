<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [ "title", "price", "description", "images", "is_remove", "center_id" , "slug" ];

    protected $casts = [
        'images' => 'array'
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function reserves()
    {
        return $this->belongsToMany(Reserve::class);
    }

    public function wish_lists()
    {
        return $this->morphMany(WishList::class , 'wish_listable');
    }
}
