<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetXacNhanDiemThi extends Model
{
    const NHAN_TAI_TRUNG_TAM = "nhận tại trung tâm";
    const NHAN_TAI_NHA = "nhận tại nhà";

    protected $table = 'cet_xac_nhan_diem_thi';

    protected $fillable = [
        'tendangnhap',
            'lydo',
            'makythi',
            'lephi',
    ];
    use HasFactory;

}
