<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Type extends Model
{
    protected $fillable = [
        'type_name', 'sort',
    ];
    public function product_type(){
        return $this->hasMany('App\Product');
    }
}
