<?php

namespace App\Http\Controllers\traits;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait UploadImage
{
    protected function uploadImages($file , $folder)
    {
        $year = Carbon::now()->year;
        $mouth = Carbon::now()->month;
        $day = Carbon::now()->day;

        $imagePath = "/uploads/images/{$folder}/{$year}-{$mouth}-{$day}/";
        $filename = $file->getClientOriginalName();

        $file = $file->move(public_path($imagePath) ,$filename);

        $sizes = ["300" ,"600" ,"900"];
        $url['images'] = $this->resize($file->getRealPath() ,$sizes ,$imagePath ,$filename);
        $url['thumb'] = $url['images'][$sizes[0]];

        return $url;
    }

    protected static function Uploading_Images_Multiple($file , $folder)
    {
        $images = [];

        foreach ($file as $caption)
        {
            $year = Carbon::now()->year;
            $mouth = Carbon::now()->month;
            $day = Carbon::now()->day;

            $imagePath = "/uploads/galleries/{$folder}/{$year}-{$mouth}-{$day}/";
            $filename = Str::random(20) . '-' . time() . '.' . $caption->getClientOriginalExtension();

            $caption->move(public_path($imagePath) ,$filename);

            array_push($images , $imagePath . $filename);
        }

        return $images;
    }

    private function resize($path ,$sizes ,$imagePath ,$filename)
    {
        $images['original'] = $imagePath . $filename;
        foreach ($sizes as $size) {
            $images[$size] = $imagePath . "{$size}_" . $filename;

            Image::make($path)->resize($size ,null ,function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($images[$size]));
        }

        return $images;
    }
}
