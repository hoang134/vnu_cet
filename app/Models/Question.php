<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    const QUESTION_PUBLIC ='public';
    const QUESTION_PRIVATE ='private';
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function questionReply()
    {
        return $this->hasOne(QuestionReply::class,'question_id','id');
    }
}

