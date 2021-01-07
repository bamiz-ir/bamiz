<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [ 'text' ,  'ticket_id' , 'is_answered' ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public static function GetCurrentQuestion($question_id)
    {
        return Question::query()->where('id' , $question_id)->first();
    }
}
