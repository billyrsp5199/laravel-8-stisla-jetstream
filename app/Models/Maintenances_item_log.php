<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenances_item_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_id',
        'm_item_id'
    ];

    public function mainID(){
        return $this->belongsTo(Maintenances::class,'main_id');
     }
    public function mID(){
        return $this->belongsTo(Maintenances_item_list::class,'m_item_id');
     }
}
