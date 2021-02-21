<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    use HasFactory;
    const FEE_PAID ='Đã thanh toán';
    const FEE_UNPAID ='Chưa thanh toán';
    const STATUS_COMPLETE ='Hoàn thành';
    const STATUS_INCOMPLETE ='Chưa hoàn thành';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'user_services','user_id','service_id');
    }
}
