<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    use HasFactory;

    protected $fillable = [ "week_days" , "fromHour" ,"toHour" ,"center_id" ];

    protected $casts= [
        'week_days' => 'array'
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
