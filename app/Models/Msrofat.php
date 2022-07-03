<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Msrofat extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'service_s',
        'quantity',
        'price',
        'note',
    ];

    public function service(){
        return $this->belongsTo(Service::class) ;
    }
}
