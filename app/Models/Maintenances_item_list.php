<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenances_item_list extends Model
{
    use HasFactory;

    protected $fillable = [
        'items_la',
        'items_en'
    ];
}
