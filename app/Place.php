<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table='Place';
    protected $fillable = [
        'email', 'location', 'photo','place_name','place_info',
    ];
}
