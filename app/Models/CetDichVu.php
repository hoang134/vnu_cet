<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CetDichVu extends Model
{
    protected $table = 'cet_dich_vu';

    protected $fillable = [
        // 'name',
        // 'email',
        // 'password',
        'id',
        'tendangnhap',
        'tendichvu',
        'dichvu_id',
        'trangthaithanhtoan',
        'trangthaithuchien',
    ];

    const TTCHUATHANHTOAN ='chua thanh toan';
    const TTDATHANHTOAN ='da thanh toan';
    const TTCHUATHUCHIEN ='chua  thuc hien';
    const TTDATHUCHIEN ='da thuc hien';

    use HasFactory;
}
