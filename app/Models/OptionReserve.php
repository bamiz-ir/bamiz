<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OptionReserve extends Pivot
{
    use HasFactory;

    protected $fillable = [ 'option_id' , 'reserve_id' ];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }
}
