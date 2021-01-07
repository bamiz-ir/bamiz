<?php


namespace App\Http\Controllers\traits;

use Illuminate\Validation\ValidationException;

trait CommentTrait
{
    private static function CheckBadWords($title , $body)
    {
        $bad_words = ['کسکش' , 'مادر جنده' , 'مادر قهوه' , 'بی ناموس' , 'لاشی' , 'گاییدم' , 'بی شعور' , 'عوضی' , 'دیوس'];

        foreach ($bad_words as $word)
        {
            if (strpos($title  , $word) || strpos($body , $word))
            {
                throw ValidationException::withMessages(['body' => 'کلماتی که استفاده کرده اید جایز نیست!']);
            }
        }
    }
}
