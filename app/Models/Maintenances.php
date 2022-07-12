<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenances extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'odo_meter',
        'report_by',
        'maintenance_date',
        'maintenance_type',
        'odo_meter_at',
        'maintenance_item',
        'cost',
        'status',
        'problem_detail',
        'remark'
    ];

    protected $casts = [
        'maintenance_item' => 'array'
    ];

    public function carID(){
        return $this->belongsTo(Car::class,'car_id');
     }
     public function userID(){
        return $this->belongsTo(Driver::class,'report_by');
     }
}
