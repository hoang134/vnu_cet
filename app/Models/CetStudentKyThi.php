<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetStudentKyThi extends Model
{
    use HasFactory;

    protected $table = 'cet_student_ky_thi';

    protected $fillable = [
        // 'name',
        // 'email',
        // 'password',
        'id',
        'tendangnhap',
        'makythi'
    ];
}
