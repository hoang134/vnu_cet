<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetXacNhanDiemThi extends Model
{
    protected $table = 'cet_xac_nhan_diem_thi';

    protected $fillable = [
        'tendangnhap',
            'lydo',
            'makythi',
            'lephi',
    ];
    use HasFactory;

}
