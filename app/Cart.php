<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\ProductImage;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id','status','qty'];

    function produk(){
    	return $this->hasMany('App\Product', 'id', 'product_id');
    }
}
