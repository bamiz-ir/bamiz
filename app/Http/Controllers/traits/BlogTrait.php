<?php


namespace App\Http\Controllers\traits;


use App\Models\Center;

trait BlogTrait
{
    public static function BestCenterBlogs()
    {
        return Center::where('is_remove' , 0)->take(10)->orderByDesc('viewCount')->get();
    }
}
