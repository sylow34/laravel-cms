<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetailModel extends Model
{
    protected $table="product_detail";
    public $guarded=[];

    public function product(){
        return $this->belongsTo("App\ProductModel","id","product_id");
    }
}
