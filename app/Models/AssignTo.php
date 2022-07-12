<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTo extends Model
{
    use HasFactory;
    protected $table='assign_to';

    protected $fillable = [
        'id',
        'fullname_la',
        'fullname_en',
        'profile_path',
        'division_id',
        'created_by'
    ];

    public function userID(){
        return $this->belongsTo(User::class,'created_by');
     } 

    public function divisionID(){
        return $this->belongsTo(Division::class,'division_id');
    }
}
