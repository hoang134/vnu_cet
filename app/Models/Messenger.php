<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    use HasFactory;

    const BELONG_USER = 'user';
    const BELONG_ADMIN = 'admin';
    const SEEN = 'seen';
    const NOT_SEEN = 'not seen';
    const BELONG_VIEWED = false;

//    public function userTo()
//    {
//        return $this->belongsTo(User::class,'user_id_to','id');
//    }
//
//    public function userFrom()
//    {
//        return $this->belongsTo(User::class,'user_id_from','id');
//    }

}
