<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [ "date", "time", "guest_count", "price", "user_id", "center_id" , "status"  , "chair_id"];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chair()
    {
        return $this->belongsTo(Chair::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    //////////////////////////////////

    public function pluckChairs()
    {
        return $this->chairs()->get()->pluck('id')->toArray();
    }

    public function pluckProducts()
    {
        return $this->products()->get()->pluck('id');
    }

    public function pluckOptions()
    {
        return $this->options()->get()->pluck('id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
