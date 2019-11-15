<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table="products";
    public $guarded = [];

    public function category(){
        return $this->belongsToMany("App\CategoryModel","product_category");
    }

    public function productDetail(){
        return $this->hasOne("App\ProductDetailModel","product_id","id")->withDefault(); // with veritabanıyla eşleşmediği durumda
    }
}
