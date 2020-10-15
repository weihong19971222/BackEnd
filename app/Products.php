<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='Products';
    protected $fillable = [
        'name', 'product_image', 'price','info','info_image','date','type_id',
    ];
    public function product(){
        return $this->belongsTo('App\ProductType','type_id');
    }
    public function products_image(){
        return $this->hasMany('App\ProductImages','product_id');
    }
}
