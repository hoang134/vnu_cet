<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'cet_student_acc';

    protected $fillable = [
        // 'name',
        // 'email',
        // 'password',
        'id',
        'tendangnhap',
        'Hoten',
        'Sodienthoai',
        'Email',
        'Trangthai',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'Hoten',
        'Sodienthoai',
        'Email',
        'Trangthai',
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function questions()
    {
        return $this->hasMany(Question::class, 'user_id', 'id');
    }

//    public function messengerTo()
//    {
//        return $this->hasMany(Messenger::class,'user_id_to','id');
//    }
//
//    public function messengerFrom()
//    {
//        return $this->hasMany(Messenger::class,'user_id_from','id');
//    }
}
