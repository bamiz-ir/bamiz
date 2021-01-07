<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    use HasFactory;

    protected $fillable = ["number", "center_id", "is_remove"];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

}
