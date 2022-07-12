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
        'insurance_exp',
        'tax_road_date',
        'remark',
        'updated_by'
    ];

    public function carID(){
       return $this->belongsTo(Car::class,'car_id');
    }

    public function driverID(){
        return $this->belongsTo(Driver::class,'driver_id');
    }
}
