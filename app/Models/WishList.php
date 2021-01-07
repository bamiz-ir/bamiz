<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
    protected $fillable = [ "user_id" , "wish_listable_id" , "wish_listable_type" ];

    /////////////////////////
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Polymorphic
    public function wish_listable()
    {
        return $this->morphTo();
    }

    public function center()
    {
        return $this->belongsTo(Center::class, 'wish_listable_id')
            ->where('wish_listable_type' , Center::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'wish_listable_id')
            ->where('wish_listable_type' , Product::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class, 'wish_listable_id')
            ->where('wish_listable_type' , Option::class);
    }
    ////
}
