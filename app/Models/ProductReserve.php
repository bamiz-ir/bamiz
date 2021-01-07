<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductReserve extends Pivot
{
    use HasFactory;

    protected $fillable = [ 'product_id' , 'reserve_id' ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }
}
