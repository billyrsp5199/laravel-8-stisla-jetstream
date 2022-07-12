<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'model',
        'vehicle',
        'serial_number',
        'engine_number',
        'power_cc',
        'date_start_usage',
        'assign_id',
        'division_id',
        'condition',
        'status',
        'photo_path'
    ];

    public function docID(){
        return $this->hasMany(DocumentCar::class,'car_id','id');
    }

    // public function driverID(){
    //     return $this->belongsTo(Driver::class,'driver_id');
    // }

    public function divisionID(){
        return $this->belongsTo(Division::class,'division_id');
    }

    public function assignID(){
        return $this->belongsTo(AssignTo::class,'assign_id');
    }
}
