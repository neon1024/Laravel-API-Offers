<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    // specify which fields in the model can be set
    protected $fillable = [
        'client_name',
        'car_plate',
        'insurer_name',
        'price',
    ];
}
