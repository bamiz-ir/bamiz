<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [ "title", "description", "images", "sale_count", "center_id" , "is_remove" , "slug" , "price" ];

    protected $casts = [
      'images' => 'array',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function reserves()
    {
        return $this->belongsToMany(Reserve::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function wish_lists()
    {
        return $this->morphMany(WishList::class , 'wish_listable');
    }
}
