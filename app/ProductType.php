<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table='Product_Type';
    protected $fillable = [
        'type_name', 'sort',
    ];
    public function product_type(){
        return $this->hasMany('App\Products','type_id');
    }
}
