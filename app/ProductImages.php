<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table='Products_Images';
    protected $fillable = [
        'product_id', 'sort', 'img_url',
    ];
    
}
