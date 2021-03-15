<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


     public function fields()
    {
        return $this->hasMany(Fields::class,'service_id','id');
    }

    public function userServices()
    {
        return $this->hasMany(UserService::class,'service_id','id');
    }
}
