<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Msrofat;

class Service extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'service',
        'jomla_price',
    ];

    // public function msrofat(){
    //     return $this->hasMany(Msrofat::class, 'service_s' , 'id') ;
    // }
}
