<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'fullname_la',
        'fullname_eng',
        'phone',
        'license_issue_date',
        'license_expire_date',
        'attached',
        'division_id',
        'created_by',
        'status'
    ];

    public function userID(){
        $this->belongsTo(User::class,'user_id');
    }

    public function divisionID(){
        $this->belongsTo(Division::class,'division_id');
    }

    public function createdBy(){
        $this->belongsTo(User::class,'created_by');
    }
}
