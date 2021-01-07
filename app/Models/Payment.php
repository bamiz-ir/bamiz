<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [ 'price' , 'refID' , 'authority' , 'user_id' , 'center_id' , 'reserve_id' , 'status' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }
}
