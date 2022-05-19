<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'car_id',
        'technical_inspection_expire',
        'register_expire',
        'yellowbook_expire',
        'driver_id',
        'remark',
        'updated_by'
    ];

    public function carID(){
        $this->belongsTo(Car::class,'car_id');
    }

    public function driverID(){
        $this->belongsTo(Driver::class,'driver_id');
    }
}
