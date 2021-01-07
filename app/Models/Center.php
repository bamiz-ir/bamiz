<?php

namespace App\Models;

use Carbon\Traits\Options;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable = ["name" ,"is_remove" ,"category_id" ,"user_id" ,"state_id"
        ,"city_id" , "chairs_people_count" , "slug"  , "description" ,  "viewCount" , "images"];

    protected $casts = [
        'images' => 'array'
    ];

    /////////////////////
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    //////////////////////////////
    public function work_time()
    {
        return $this->hasOne(WorkTime::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment' , 'commentable');
    }

    public function wish_lists()
    {
        return $this->morphMany(WishList::class , 'wish_listable');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function chairs()
    {
        return $this->hasMany(Chair::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    ###################################

    public static function getCenters()
    {
        return Center::where('is_remove', 0)->latest()->get();
    }
}
