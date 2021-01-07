<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'chid' , 'is_remove' , 'slug' , 'images'];

    protected $casts = [
        'images' => 'array',
    ];

    ////////////////////////////
    public function centers()
    {
        return $this->hasMany(Center::class);
    }
}
