<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function resultsFeld()
    {
        return $this->hasOne(ResultsFields::class,'fields_id','id');
    }
}

