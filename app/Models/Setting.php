<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [ 'key' , 'value' ];
    /////////////////////////////////////////////////////////////
    public static function getPriceFromSettings()
    {
        $setting =  Setting::query()->firstOrCreate(['key' => 'price'] , ['value' => 1000]);
        return $setting->value;
    }
}
